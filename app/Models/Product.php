<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table = 'products';
    protected $fillable = [
        'name', 'slug', 'brand_id', 'category_id', 'description', 'price', 'quantity', 'image', 'status'
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
}
