<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryService extends Model
{
    protected $table = 'category_services';

    protected $fillable = [
        'slug',
        'status',
    ];
}
