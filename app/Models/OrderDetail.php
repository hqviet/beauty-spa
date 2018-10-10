<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetail extends Model
{
    use SoftDeletes;

    protected $table = 'order_details';
    protected $fillable = [
        'order_id', 'product_id', 'price', 'quantity'
    ];
    protected $dates = ['deleted_at'];


    public function order()
    {
        return $this->hasOne('App\Models\Order', 'order_id');
    }

    public function product()
    {
        return $this->hasOne('App\Models\Product', 'product_id');
    }
}
