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
        $cate = CategoryService::where('slug', $slug)->first();
        if(!$cate){
            abort(404);
        }
        $services = Service::listsByCate($cate->id)->paginate(1);
        $cateTranslation = CategoryServiceTranslation::where('category_services_id', $cate->id)->where('lang', app()->getLocale())->first();
        return view('frontend.service.category', compact('services', 'cateTranslation'));
    }

    public function service(Request $request)
    {
        $services = Service::listServices()->paginate(3);
        return view('frontend.service.list_service', compact('services'));
    }

    public function serviceDetail($slug)
    {
        $service = Service::where('slug', $slug)->first();
        if(!$service){
            abort(404);
        }
        $service_t = $service->translation()->first();
        if(!$service_t) {
            abort(404);
        }

        return view('frontend.service.detail_service', compact('service_t'));
    }
}
