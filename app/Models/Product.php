<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table = 'products';
    protected $fillable = [
        'name', 'slug', 'brand', 'category_id', 'description', 'price', 'quantity', 'image', 'status'
    ];
    protected $dates = ['deleted_at'];

    
    
}
