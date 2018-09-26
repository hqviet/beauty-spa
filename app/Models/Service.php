<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;

    protected $table = 'services';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'slug',
        'category_service_id',
        'image',
        'price'
    ];

    public function categoryService()
    {
        return $this->belongsTo(CategoryService::class, 'category_service_id', 'id');
    }

    public function serviceTranslation()
    {
        return $this->hasMany(ServiceTranslation::class, 'services_id', 'id');
    }

    public function translation($language = null)
    {
        if ($language == null) {
            $language = app()->getLocale();
        }
        return $this->hasMany(ServiceTranslation::class, 'services_id', 'id')
            ->where('lang', '=', $language);
    }

    public static function listServices($lang = null)
    {
        if ($lang == null) {
            $lang = app()->getLocale();
        }

        return self::select('services.id', 'slug', 'category_service_id',
            'image' ,'price', 'st.name AS s_name', 'cst.name AS cst_name', 'short_description', 'description')
            ->join('services_translations AS st', function($join) use ($lang){
                $join->on('services.id', '=', 'st.services_id')
                    ->where('st.lang', '=', $lang);
            })
            ->join('category_services_translations AS cst', function($join) use ($lang) {
                $join->on('services.category_service_id', '=', 'cst.category_services_id')
                    ->where('cst.lang', '=', $lang);
            })->orderBy('services.id', 'DESC');
    }

    public static function listsByCate($id_cate, $lang=null)
    {
        if ($lang == null) {
            $lang = app()->getLocale();
        }

        return self::select('services.id', 'slug', 'category_service_id',
            'image' ,'price', 'st.name AS s_name', 'cst.name AS cst_name', 'short_description', 'description')
            ->join('services_translations AS st', function($join) use ($lang){
                $join->on('services.id', '=', 'st.services_id')
                    ->where('st.lang', '=', $lang);
            })
            ->join('category_services_translations AS cst', function($join) use ($lang, $id_cate) {
                $join->on('services.category_service_id', '=', 'cst.category_services_id')
                    ->where('cst.lang', '=', $lang)->where('services.category_service_id', $id_cate);
            })->orderBy('services.id', 'DESC');

    }


}
