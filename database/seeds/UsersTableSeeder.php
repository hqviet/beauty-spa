<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_users')->truncate();
        DB::table('users')->truncate();
        DB::table('roles')->truncate();

        // Create Admin Role
        $role1 = [
            'name' => 'Admin',
            'slug' => 'admin',
        ];
        $adminRole = Sentinel::getRoleRepository()->createModel()->fill($role1)->save();

        // Create Employee
        $role2 = [
            'name' => 'Employee',
            'slug' => 'employee',
        ];
        $employeeRole = Sentinel::getRoleRepository()->createModel()->fill($role2)->save();

        // Create User Role
        $role3 = [
            'name' => 'User',
            'slug' => 'user',
        ];
        $userRole = Sentinel::getRoleRepository()->createModel()->fill($role3)->save();

        // Create user with admin-role
        $admin_data = [
            //'username' => 'admin',
            'first_name' => 'admin',
            'last_name' => 'admin',
            'email'    => 'admin@gmail.com',
            'password' => 'admin@123',
            'permissions' => [
                'administrator' => true,
                'directorate' => true,
            ]
        ];

        $admin = Sentinel::registerAndActivate($admin_data);
        $role = Sentinel::findRoleBySlug('admin');
        $role->users()->attach($admin);

        // Create user with employee-role
        $employee_data = [
            //'username' => 'admin',
            'first_name' => 'Employee',
            'last_name' => 'employee',
            'email'    => 'employee@gmail.com',
            'password' => 'employee@123',
            'permissions' => [
                'administrator' => true,
                'directorate' => false,
            ]
        ];

        $employee = Sentinel::registerAndActivate($employee_data);
        $role = Sentinel::findRoleBySlug('employee');
        $role->users()->attach($employee);


        // Create user with user-role
        $member_data = [
            //'username' => 'member',
            'first_name' => 'Member',
            'last_name' => '',
            'email'    => 'member@gmail.com',
            'password' => 'member@123',
            'permissions' => [
                'administrator' => false,
                'directorate' => false,
            ]
        ];

        $member = Sentinel::registerAndActivate($member_data);
        $role = Sentinel::findRoleBySlug('user');
        $role->users()->attach($member);
    }
}
