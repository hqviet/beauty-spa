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

}
