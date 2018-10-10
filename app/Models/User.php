<?php

namespace App\Models;

use Cartalyst\Sentinel\Users\EloquentUser;

class User extends EloquentUser
{
    /**
     * The table model
     *
     * @var string
     */
    protected $table = "users";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'address',
        'phone',
        'permissions',
        'first_name',
        'last_name'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public static function getUserWithAll($id)
    {
        return self::where('users.id', '=', $id)
        ->join('role_users', 'role_users.user_id', '=', 'users.id')
        ->join('roles', 'roles.id', '=', 'role_users.role_id')
        ->select('users.id', 'users.first_name', 'users.last_name', 'users.email', 'users.address', 'users.phone', 'roles.slug as r_slug')
        ->first();
    }
}
