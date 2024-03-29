<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            \App\Repositories\Products\ProductRepository::class,
            \App\Repositories\Products\EloquentProduct::class
        );
        $this->app->singleton(
            \App\Repositories\Menu\MenuRepository::class,
            \App\Repositories\Menu\EloquentMenu::class
        );
        $this->app->singleton(
            \App\Repositories\ImgProducts\ImgProductRepository::class,
            \App\Repositories\ImgProducts\EloquentImgProduct::class
        );
        $this->app->singleton(
            \App\Repositories\User\UserRepository::class,
            \App\Repositories\User\EloquentUser::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
