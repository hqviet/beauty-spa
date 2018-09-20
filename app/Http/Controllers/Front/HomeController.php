<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service;
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
        $products = Product::all();
        return view('frontend.index', [
            'services' => $services,
            'categories' => $categories,
            'products' => $products,
            'limit' => 8
        ]);
    }
}
