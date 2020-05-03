<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Brands;
use App\Models\Banners;
use App\Models\Products;
use App\Models\Bills;
use Illuminate\Support\Facades\Auth;

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

        view()->composer('fontend/master/header', function ($view) {
            $brand = Brands::where('status', 1)->get();
            $view->with('brand', $brand);
            if (session()->has('cart')) {
                $carts = session('cart');
                foreach ($carts as $key => $value) {
                    $product = Products::find($value['products_id']);
                    $carts[$key]['product'] = $product;
                }
                $data['carts'] = $carts;
                $view->with('carts', $carts);
            }
            if(Auth::check()){
                $id=Auth::user()->id;
                $bills=Bills::where('users_id',$id)->get();
                $view->with('bills',$bills);
            }
        });
        view()->composer('fontend/page/home', function ($view) {
            $banner = Banners::where('status', 1)->get();
            $view->with('banner', $banner);
        });
        view()->composer('fontend/page/list-product', function ($view) {
            $brand = Brands::where('status', 1)->get();
            $view->with('brands', $brand);
        });
    }
}
