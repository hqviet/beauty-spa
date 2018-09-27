<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryServiceTranslation extends Model
{
    protected $table = 'category_services_translations';

    protected $fillable = [
        'category_services_id',
        'lang',
        'name',
    ];

    public function categoryService()
    {
        return $this->belongsTo(CategoryService::class, 'category_services_id', 'id');
    }
    
    public static function listCategoryServiceTranslation($lang = null)
    {
        if ($lang == null) {
            $lang = app()->getLocale();
        }

        return self::where('lang', $lang);
    }
}
