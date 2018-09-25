<?php

namespace App\Providers;

use App\Models\CategoryServiceTranslation;
use Illuminate\Support\ServiceProvider;
use View;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;

class SpaServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['frontend.layout.header'], function ($view) {
            $category_services = CategoryServiceTranslation::all();
            $categories = Category::all();
            $brands = Brand::all();
            $view->with([
                'category_services' => $category_services,
                'categories' => $categories,
                'brands' => $brands
                ]);
        });
        View::composer(['frontend.product_in_brand'], function ($view) {
            $categories = Category::all();
            $brands = Brand::all();
            $view->with([
                'categories' => $categories,
                'brands' => $brands
                ]);
        });
        View::composer(['frontend.home.brand'], function ($view) {
            $brands = Brand::all();
            $view->with([
                'brands' => $brands
                ]);
        });
        View::composer(['frontend.product_in_category'], function ($view) {
            $categories = Category::all();
            $brands = Brand::all();
            $view->with([
                'categories' => $categories,
                'brands' => $brands
                ]);
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
