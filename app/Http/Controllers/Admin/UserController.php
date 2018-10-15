<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Sentinel;
use Carbon\Carbon;
use File;

class UserController extends Controller
{
    protected $user;
    protected $user_index;
    protected $user_form;

    public function __construct()
    {
        $this->user = new User;
        $this->user_index = 'admin.pages.user.index';
        $this->user_form = 'admin.pages.user.form';
    }

    public function showList(Request $request)
    {
        $users = User::getAllUser();
        $options = [
            'users' => $users,
        ];
        return view($this->user_index, $options);
    }

    public function showAddForm(Request $request)
    {
        $user = Sentinel::getUser();
        $isAdmin = $user->permissions['administrator'];
        $roles = Sentinel::getRoleRepository()->get();

        $options = [
            'isAdmin' => $isAdmin,
            'role' => 'add',
            'action' => 'create',
            'roles' => $roles,
            'id' => null,
        ];
        return view($this->user_form, $options);
    }

    public function addUser(AddUserRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = [
                'email' => $request->get('email'),
                'password' => $request->get('password'),
                'address' => $request->get('address'),
                'phone' => $request->get('phone'),
                'permissions' => [
                    "administrator" => false,
                    "directorate" => false,
                ],
                'first_name' => $request->get('firstname'),
                'last_name' => $request->get('lastname'),
            ];
            if ($request->hasFile('avatar')) {
                $image = $request->file('avatar');
                $name = $data['email'] . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/users');
                $imagePath = $destinationPath . "/" . $name;
                $image->move($destinationPath, $name);
                $data['avatar'] = $name;
            } else {
                return back()->withInput();
            }
            Sentinel::registerAndActivate($data);
            $user = Sentinel::findByCredentials([
                'email' => $data['email']
            ]);
            $role = Sentinel::findRoleById($request->get('role', 3));
            $role->users()->attach($user);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withInput()->with('add_user', [
                'status' => 'danger',
                'message' => $e->getMessage(),
            ]);
        }
        DB::commit();
        return redirect()->back()->with('add_user', [
            'status' => 'success',
            'message' => 'User has been created successfully!!',
        ]);
    }

    public function showEditForm($id, Request $request)
    {
        $user = User::getUserWithAll($id);
        $loggedUser = Sentinel::getUser();
        $isAdmin = $loggedUser->permissions['administrator'];
        $options = [
            'user' => $user,
            'role' => 'edit',
            'action' => 'edit',
            'id' => $id,
            'isAdmin' => $isAdmin,
            'userRole' => 1
        ];
        if ($isAdmin == true) {
            $roles = Sentinel::getRoleRepository()->get();
            $options['roles'] = $roles;
        }
        return view($this->user_form, $options);
    }

    public function editUser(UpdateUserRequest $request)
    {
        try {
            // dd($request->all());
            DB::beginTransaction();
            $user = Sentinel::findById($request->get('id'));
            $roleId = $request->get('role');
            $data = [
                'first_name' => $request->get('firstname'),
                'last_name' => $request->get('lastname'),
                'address' => $request->get('address'),
                'phone' => $request->get('phone'),
            ];
            if ($request->hasFile('avatar')) {
                $image = $request->file('avatar');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/users');
                $imagePath = $destinationPath . "/" . $name;
                $image->move($destinationPath, $name);
                $data['avatar'] = $name;
                $old_image_path = "/uploads/users/" . User::find($request->get('id'))->image;
                if (File::exists($old_image_path)) {
                    File::delete($old_image_path);
                }
            }
            $oldRoleId = $user->getRoles()->first()->id;
            $oldRole = Sentinel::findRoleById($oldRoleId);
            $oldRole->users()->detach($user);
            $role = Sentinel::findRoleById($roleId);
            $role->users()->attach($user);
            $user->update($data);
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withInput()->with('update_user', [
                'status' => 'danger',
                'message' => $e->getMessage()
            ]);
        }
        DB::commit();
        return redirect()->route('admin.user.list')->with('update_user', [
            'status' => 'success',
            'message' => 'User has been updated successfully!!',
        ]);
    }
}
