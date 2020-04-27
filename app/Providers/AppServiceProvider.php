<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Brands;
use App\Models\Banners;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
        view()->composer('fontend/master/header',function($view){
            $brand=Brands::where('status',1)->get();
            $view->with('brand',$brand);
        });
        view()->composer('fontend/page/home',function($view){
            $banner=Banners::where('status',1)->get();
            $view->with('banner',$banner);
        });
        view()->composer('fontend/page/list-product',function($view){
            $brand=Brands::where('status',1)->get();
            $view->with('brands',$brand);
        });
    }
}
