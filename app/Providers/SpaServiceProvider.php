<?php

namespace App\Providers;

use App\Models\CategoryServiceTranslation;
use Illuminate\Support\ServiceProvider;
use View;
use Illuminate\Http\Request;

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
            $view->with('category_services', $category_services);
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
