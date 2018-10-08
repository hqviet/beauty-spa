<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Sentinel;
use DB;

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

        $options = [
            'isAdmin' => $isAdmin,
            'role' => 'add',
            'action' => 'create',
            'id' => null,
        ];
        return view($this->user_form, $options);
    }

    public function addUser(AddUserRequest $request) 
    {
        try {
            $data = [
                'email' => $request->get('email'),
                'password' => $request->get('password'),
                'address' => $request->get('address'),
                'phone' => $request->get('phone'),
                'permissions' => [
                    "administrator" => false,
                    "directorate" => false
                ],
                'first_name' => $request->get('firstname'),
                'last_name' => $request->get('lastname')
            ];
            Sentinel::registerAndActivate($data);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('add_user', [
                'status' => 'danger',
                'message' => 'Fail to add user!!'
            ]);
        }
        return redirect()->back()->with('add_user', [
            'status' => 'success',
            'message' => 'User has been created successfully!!'
        ]);
    }

    public function showEditForm($id, Request $request)
    {
        $user = User::find($id);
        $isAdmin = $user->permissions['administrator'];
        $options = [
            'user' => $user,
            'role' => 'edit',
            'action' => 'edit',
            'id' => $id,
            'isAdmin' => $isAdmin 
        ];
        if ($isAdmin == true) {
            $roles = DB::table('roles')->select('slug', 'name')->get();
            $options['roles'] = $roles;
        } 
        return view($this->user_form, $options);
    }

    public function editUser(UpdateUserRequest $request)
    {
        $user = Sentinel::findById($request->get('id'));
        $role = $request->get('role', '');
        $data = [
            'first_name' => $request->get('firstname'),
            'last_name' => $request->get('lastname'),
            'address' => $request->get('address'),
            'phone' => $request->get('phone')
        ];
        if ($role) {
            $newRole = Sentinel::findRoleBySlug($role);
            $newRole->user()->attach($user);
        }
        $user->update($data);
    }
}
