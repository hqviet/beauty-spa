<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $services = Service::listServices()->take(6)->get();
        return view('frontend.index', compact('services'));
    }
}
