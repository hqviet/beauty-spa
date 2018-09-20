<?php

namespace App\Http\Controllers\Front;

use App\Models\CategoryService;
use App\Models\CategoryServiceTranslation;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function category($slug)
    {
        $lang = session()->get('language');
        $cate = CategoryService::where('slug', $slug)->first();
        if(!$cate){
            abort(404);
        }
        $services = Service::listsByCate($cate->id, $lang)->paginate(1);
        $cateTranslation = CategoryServiceTranslation::where('category_services_id', $cate->id)->where('lang', $lang)->first();
        return view('frontend.service.category', compact('services', 'cateTranslation'));
    }

    public function service(Request $request)
    {
        $lang = $request->session()->get('language');
        $services = Service::listServices($lang)->paginate(3);
        return view('frontend.service.list_service', compact('services'));
    }

    public function serviceDetail($slug)
    {
        $lang = session()->get('language');
        $service = Service::where('slug', $slug)->first();
        if(!$service){
            abort(404);
        }
        $service_t = $service->translation($lang);

        return view('frontend.service.detail_service', compact('service_t'));
    }
}
