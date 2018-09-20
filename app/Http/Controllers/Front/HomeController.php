<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $lang = $request->session()->get('language');
        $services = Service::listServices($lang)->take(6)->get();
        return view('frontend.index', compact('services'));
    }
}
