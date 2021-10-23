<?php

use Illuminate\Support\Facades\Route;

/**
 * sign in or login
 */
Route::get('admin-login', 'Admin\HomeController@login');
Route::post('admin-login', 'Admin\HomeController@isLogin')->name('admin.login.isLogin');
Route::get('admin-logout', 'Admin\HomeController@logout')->name('admin.logout');

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'adminlogin', 'as' => 'admin.'], function () {
    Route::get('/', function () {
        return redirect(route('dashboard.index'));
    });
    /**
     * Dashboard
     */
    Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');

    /**
     * Category
     *
     */
    Route::resource('category', 'CategoryController')->names('category')->parameters([
        'category' => 'id',
    ])->except('show');
    Route::group(['prefix' => 'category'], function () {
        Route::get('active/{id}', 'CategoryController@active')->name('category.active');
        Route::get('unactive/{id}', 'CategoryController@unactive')->name('category.unactive');

        Route::post('store-brand', 'CategoryController@storeBrand')->name('category.storeBrand');
        Route::get('del-brand-cate/{id}', 'CategoryController@deleteBrand')->name('category.deleteBrand');
        Route::get('{id}/product', 'CategoryController@getListProduct')->name('category.getListProduct');
    });

    /**
     * Banner
     */
    Route::resource('banner', 'BannerController')->names('banner')->parameters([
        'banner' => 'id',
    ])->except('show');
    Route::group(['prefix' => 'banner'], function () {
        Route::get('/active/{id}', 'BannerController@active')->name('banner.active');
        Route::get('/unactive/{id}', 'BannerController@unactive')->name('banner.unactive');
    });

    /**
     * User
     */
    Route::resource('user', 'UserController')->names('user')->parameters([
        'user' => 'id'
    ]);
    Route::get('change-password/{id}', 'UserController@changePassword')->name('user.changePassword');
    Route::patch('post-change-pw', 'UserController@updatePassword')->name('user.updatePassword');

    /**
     * Product
     * 
     */
    Route::resource('product', 'ProductController')->names('product')->parameters([
        'product' => 'id',
    ])->except('show');

    Route::group(['prefix' => 'product'], function () {
        Route::get('store-infor', 'ProductController@updateInfoProduct')->name('updateInfoProduct');
    });

    Route::group(['prefix' => 'image-product'], function () {
        Route::get('/{id}', 'ImageProductController@index')->name('imageProduct.index');
        Route::post('/{id}', 'ImageProductController@store')->name('imageProduct.store');
        Route::delete('/{id}', 'ImageProductController@destroy')->name('imageProduct.destroy');
        Route::patch('update-image-product', 'ImageProductController@updateStatus')->name('imageProduct.updateStatus');
        Route::get('change-avatar/{image_id}/{products_id}', 'ImageProductController@changeAvatar')->name('imageProduct.changeAvatar');
    });

    /**
     * Brand of product
     * 
     */
    Route::resource('brand', 'BrandController')->names('brand')->parameters([
        'brand' => 'id',
    ])->except('show');

    /**
     * Bill
     * 
     */
    Route::resource('bill', 'BillController')->names('bill')->parameters([
        'bill' => 'id',
    ])->except('edit', 'create', 'store');

    /**
     * News
     * 
     */
    Route::resource('news', 'NewsController')->names('news')->parameters([
        'news' => 'id'
    ])->except('show');
    Route::group(['prefix' => 'news'], function () {
        Route::get('active/{id}', 'NewsController@active')->name('news.active');
        Route::get('unactive/{id}', 'NewsController@unactive')->name('news.unactive');
    });

    /**
     * contact
     */
    Route::resource('contact', 'ContactController')->names('contact')->parameters(['contact' => 'id'])->only('index', 'destroy');
    Route::get('reply-contact', 'ContactController@reply')->name('contact.reply');

    /**
     * seach
     */
    Route::group(['prefix' => 'seach'], function () {
        Route::get('bill', 'SeachController@getBill')->name('seachBill');
        Route::get('products', 'SeachController@getProducts')->name('seach.products');
        '
        ';
    });

    /**
     * Menu
     */
    Route::resource('menu', 'MenuController')->names('menu')->parameters(['menu' => 'id'])->except('show');
    Route::post('menu/active', 'MenuController@active')->name('menu.active');
    Route::post('menu/unactive', 'MenuController@unactive')->name('menu.unactive');

    /**
     * Information company
     */
    Route::get('/information-company', 'CompanyController@index')->name('company.index');
    Route::post('/information-company', 'CompanyController@store')->name('company.store');

    /**
     * Setting
     */
    Route::get('setting', 'SettingController@general')->name('setting.general');
    Route::post('setting', 'SettingController@store')->name('setting.store');
});

//Route fontend
Route::group(['namespace' => 'FontEnd'], function () {
    /** 
     * product in fontend
     */
    Route::get('product/{id}', 'ProductController@show')->name('fontend.product.show');

    /**
     * home client
     */
    Route::get('/', 'HomeController@index')->name('fontend.index');

    /**
     * login, sign up, logout of client 
     */
    Route::get('/user/sign-up', 'UserController@create')->name('fontend.user.create');
    Route::post('/user/sign-up', 'UserController@store')->name('fontend.user.store');
    Route::get('/user-login', 'UserController@login')->name('fontend.user.login');
    Route::post('/user-login', 'UserController@checkLogin')->name('fontend.user.checkLogin');
    Route::get('/user-infor/{id}', 'UserController@show')->name('fontend.user.show');
    Route::put('/user-infor/{id}', 'UserController@update')->name('fontend.user.update');
    Route::get('/user-logout', 'UserController@logout')->name('fontend.user.logout');

    //danh sách sản phẩm theo thương hiệu
    Route::get('/brand/{idCategory}/{idBrand?}', 'BrandController@product_of_brand')->name('brand');


    //danh sách sản phẩm
    Route::group(['prefix' => 'product'], function () {
        Route::get('male-product', 'ProductController@all_male_product')->name('male-product');
        Route::get('male-product-{id}', 'ProductController@all_male_product_brand')->name('male-product/');
        Route::get('female-product', 'ProductController@all_female_product')->name('female-product');
        Route::get('female-product-{id}', 'ProductController@all_female_product_brand')->name('female-product/');
    });

    /**
     * list product
     */
    Route::group(['prefix' => 'product'], function () {
        Route::get('/list/brand/{id}', 'ProductController@getProductToBrand')->name('fontend.product.getProductToBrand');
        Route::get('/list/category/{id}', 'ProductController@getProductToCategory')->name('fontend.product.getProductToCategory');
    });
    /**
     * news in fontend
     */
    Route::resource('news', 'NewsController')->names('fontend.news')->parameters([
        'news' => 'id',
    ])->only('index', 'show');

    /**
     * contact
     */
    Route::get('/contact', 'ContactController@create')->name('fontend.contact.create');
    Route::post('/contact', 'ContactController@store')->name('fontend.contact.store');

    /**
     * cart
     */
    Route::group(['prefix' => 'cart'], function () {
        Route::get('list', 'CartController@index')->name('fontend.cart.index');
        Route::get('add', 'CartController@add')->name('addCart');
        Route::get('update', 'CartController@updateCart')->name('updateCart');
        Route::get('delete/{products_id}', 'CartController@delete')->name('deleteCart');
    });

    /**
     * bill
     */
    Route::group(['prefix' => 'bill'], function () {
        Route::post('create', 'BillController@store')->name('fontend.bill.store');
        Route::get('/{id}', 'BillController@show')->name('fontend.bill.show');
    });

    //seach
    Route::get('seach', 'SeachFontEndController@getSeach')->name('seachFE');
    //delete comment
    Route::group(['prefix' => 'comment'], function () {
        Route::get('delete/{id}', 'CommentController@delete')->name('deleteComment');
        Route::get('deleteReply/{id}', 'CommentController@deleteReply')->name('deleteReplyComment');
    });
});
