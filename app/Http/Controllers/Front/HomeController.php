<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceTranslation;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $lang = $request->session()->get('language');
        $services = Service::listServices($lang)->take(6)->get();
        $categories = Category::select('name', 'slug')->get();
        $brands = Brand::select('name', 'slug')->get();
        $products = Product::listProduct($lang);
        return view('frontend.index', [
            'services' => $services,
            'categories' => $categories,
            'products' => $products,
            'brands' => $brands,
            'limit' => 8
        ]);


    }

    public function search(Request $request)
    {
        $services = Service::listsByKeyword($request->get('keyword'))->paginate(6);        
        return view('frontend.search', [
            'services' => $services
        ]);
    }

    
}
