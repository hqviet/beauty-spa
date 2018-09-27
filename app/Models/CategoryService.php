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

    public function categoryServiceTranslation()
    {
        return $this->hasMany(CategoryServiceTranslation::class, 'category_services_id', 'id');
    }
}
