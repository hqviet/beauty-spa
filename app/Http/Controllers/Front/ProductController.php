<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;

class ProductController extends Controller
{
    protected $product;
    protected $brand;
    protected $category;
    protected $product_detail_view;
    protected $product_in_brand;
    protected $product_in_category;

    public function __construct()
    {
        $this->product = new Product;
        $this->brand = new Brand;
        $this->category = new Category;
        $this->product_detail_view = 'frontend.product_detail';
        $this->product_in_brand = 'frontend.product_in_brand';
        $this->product_in_category = 'frontend.product_in_category';
    }

    public function showProductDetail($slug, Request $request)
    {
        // $slug = $request->get('slug');
        $product = $this->product->where('slug', '=', $slug)->first();
        $options = [
            'product' => $product
        ];
        return view($this->product_detail_view, $options);
    }

    public function showProductInCategory($slug, Request $request)
    {
        $category = $this->category->select('id', 'name')->where('slug', '=', $slug)->first();
        if (!$category) {
            return view('frontend.404');
        }
        $products = $this->product->where('category_id', '=', $category->id)->paginate(5);
        $options = [
            'category_result' => $category->name,
            'products' => $products
        ];
        return view($this->product_in_category, $options);
    }

    public function showProductInBrand($slug, Request $request)
    {
        $brand = $this->brand->select('id', 'name')->where('slug', '=', $slug)->first();
        if (!$brand) {
            return view('frontend.404');
        }
        $products = $this->product->where('brand_id', '=', $brand->id)->paginate(5);
        $options = [
            'brand_result' => $brand->name,
            'products' => $products
        ];
        return view($this->product_in_brand, $options);
    }
}
