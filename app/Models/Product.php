<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table = 'products';
    protected $fillable = [
       'slug', 'brand_id', 'category_id', 'price', 'quantity', 'image', 'status'
    ];
    protected $dates = ['deleted_at'];

    public function brand()
    {
        return $this->belongsTo('App\Models\Brand', 'brand_id');
    }
    
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function productTran()
    {
        return $this->hasMany('App\Models\ProductTran');
    }

    public function listProduct($lang = null)
    {
        if ($lang == null) {
            $lang = app()->getLocale();
        }
        
    }
}
