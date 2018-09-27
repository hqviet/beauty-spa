<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductTran extends Model
{
    use SoftDeletes;

    protected $fillable = ['product_id', 'lang', 'name', 'description'];
    protected $dates = ['deleted_at'];

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }
}
