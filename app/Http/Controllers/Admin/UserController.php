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
        $users = User::where('email', '!=', 'admin@gmail.com')->get();
        $options = [
            'users' => $users,
        ];
        return view($this->user_index, $options);
    }

    public function showAddForm(Request $request)
    {
        $user = Sentinel::getUser();
        $isAdmin = $user->permissions['administrator'];
        $roles = DB::table('roles')->select('id', 'slug', 'name')->get();

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
        dd(User::select('id')->where('email', '=', 'admin@gmail.com')->first()->id);
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
            Sentinel::registerAndActivate($data);
            $lastInsertedId = User::where('email', '=', $data['email'])->first()->id;
            DB::table('role_users')->save([
                'user_id' => $lastInsertedId,
                'role_id' => $request->get('role', 3)
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withInput()->with('add_user', [
                'status' => 'danger',
                'message' => 'Fail to add user!!',
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
            $roles = DB::table('roles')->select('id', 'slug', 'name')->get();
            $options['roles'] = $roles;
        }
        return view($this->user_form, $options);
    }

    public function editUser(UpdateUserRequest $request)
    {
        try {
            // $user = Sentinel::findById($request->get('id'));
            $user = User::findOrFail($request->get('id'));
            $role = $request->get('role', '');
            $data = [
                'first_name' => $request->get('firstname'),
                'last_name' => $request->get('lastname'),
                'address' => $request->get('address'),
                'phone' => $request->get('phone'),
            ];
            if ($role) {
                $roleId = Sentinel::findRoleBySlug($role)->id;
                DB::table('role_users')->where('user_id', '=', $user->id)->update([
                    'role_id' => $roleId,
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
            }
            $user->update($data);
        } catch (\Exception $e) {
            return back()->withInput()->with('update_user', [
                'status' => 'danger',
                'message' => $e->getMessage()
            ]);
        }
        return redirect()->route('admin.user.list')->with('update_user', [
            'status' => 'success',
            'message' => 'User has been updated successfully!!',
        ]);
    }
}
