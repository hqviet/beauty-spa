<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    protected $product;
    protected $product_detail_view;
    protected $product_in_brand;
    protected $product_in_category;

    public function __construct()
    {
        $this->product = new Product;
        $this->product_detail_view = 'frontend.product_detail';
        $this->product_in = 'frontend.product_in_brand';
        $this->product_in = 'frontend.product_in_category';
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
        $category_id = $this->category->select('id')->where('slug', '=', $slug)->first();
        $products = $this->product->where('category_id', '=', $category_id);
        $options = [
            'products' => $products
        ];
        return view($this->product_in_category, $options);
    }

    public function showProductInBrand($slug, Request $request)
    {
        $brand_id = $this->brand->select('id')->where('slug', '=', $slug)->first();
        $products = $this->product->where('category_id', '=', $category_id);
        $options = [
            'products' => $products
        ];
        return view($this->product_in_category, $options);
    }
}
