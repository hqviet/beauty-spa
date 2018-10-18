<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $table = 'orders';
    protected $fillable = [
        'user_id', 'name', 'email', 'phone', 'address', 'note', 'payment', 'total', 'status'
    ];
    protected $dates = ['deleted_at'];

}
