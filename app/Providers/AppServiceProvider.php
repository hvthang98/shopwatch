<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Models\Brands;
use App\Models\Banners;
use App\Models\Products;
use App\Models\Order;
use App\Models\Carts;
use App\Models\Menu;

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
        view()->composer('backend.layouts.header',function($view){
            $bills=Order::where('status',0)->count();
            $view->with('numbills',$bills);
        });
        view()->composer('fontend/master/header', function ($view) {
            // $category = Categories::where('status', 1)->orderBy('ordernum','asc')->get();
            // $view->with('categories', $category);
            $menu = Menu::where('status',1)->orderBy('ordernum','asc')->get();
            $view->with('menus', $menu);
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
                //bill
                $bills=Order::where('users_id',$id)->get();
                $view->with('bills',$bills);
                //cart
                $carts=Carts::where('users_id',$id)->get();
                $view->with('carts',$carts);
            }
        });
        view()->composer('fontend/page/home', function ($view) {
            $banner = Banners::where('status', 1)->orderBy('ordernum','asc')->get();
            $view->with('banner', $banner);
        });
        view()->composer('fontend/page/list-product', function ($view) {
            $brand = Brands::where('status', 1)->get();
            $view->with('brands', $brand);
        });
    }
}
