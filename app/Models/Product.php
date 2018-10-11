<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table = 'products';
    protected $fillable = [
        'slug', 'brand_id', 'category_id', 'price', 'quantity', 'image', 'status',
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
        return $this->hasMany('App\Models\ProductTran', 'product_id');
    }

    public function translation($lang = null) 
    {
        if ($lang == null) {
            $lang = app()->getLocale();
        } 
        return $this->hasMany('App\Models\ProductTran', 'product_id')->where('lang', '=',  $lang);
    }

    public static function listProduct($lang = null)
    {
        if ($lang == null) {
            $lang = app()->getLocale();
        }
        $listProduct = self::join('product_trans', 'product_trans.product_id', '=', 'products.id')
        ->select('products.id', 'products.slug', 'products.price', 'products.quantity', 'products.category_id', 'products.brand_id', 'products.image', 'product_trans.name', 'product_trans.description')
        ->where('product_trans.lang', '=', $lang)->get();
        return $listProduct;
    }

    public static function listProductInBrand($lang = null, $brand)
    {
        if ($lang == null) {
            $lang = app()->getLocale();
        }
        $listProduct = self::join('product_trans', 'product_trans.product_id', '=', 'products.id')
        ->select('products.id', 'products.slug', 'products.price', 'products.quantity', 'products.category_id', 'products.brand_id', 'products.image', 'product_trans.name', 'product_trans.description')
        ->where('product_trans.lang', '=', $lang)->where('products.brand_id', '=', $brand);
        return $listProduct;
    }

    public static function listProductInCategory($category, $lang = null)
    {
        if ($lang == null) {
            $lang = app()->getLocale();
        }
        $listProduct = self::join('product_trans', 'product_trans.product_id', '=', 'products.id')
        ->select('products.id', 'products.slug', 'products.price', 'products.quantity', 'products.category_id', 'products.brand_id', 'products.image', 'product_trans.name', 'product_trans.description')
        ->where('product_trans.lang', '=', $lang)->where('products.category_id', '=', $category);
        return $listProduct;
    }

    public static function singleProduct($slug, $lang)
    {
        if ($lang == null) {
            $lang = app()->getLocale();
        }
        $singleProduct = self::join('product_trans', 'product_trans.product_id', '=', 'products.id')
        ->select('products.id', 'products.slug', 'products.price', 'products.quantity', 'products.category_id', 'products.brand_id', 'products.image', 'product_trans.name', 'product_trans.description')
        ->where('product_trans.lang', '=', $lang)->where('products.slug', '=', $slug)->first();
        return $singleProduct;
    }
}
