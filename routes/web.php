<?php

use App\Http\Controllers\Admin\HomeAdmin;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;
use App\Models\Products;

/**
 * sign in or login
 */
Route::get('admin-login', 'Admin\HomeController@login');
Route::post('admin-login', 'Admin\HomeController@isLogin')->name('admin.login.isLogin');
Route::get('admin-logout', 'Admin\HomeController@logout')->name('admin.logout');

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'adminlogin'], function () {
    Route::get('/', function () {
        return redirect(route('admin.dashboard.index'));
    });
    /**
     * Dashboard
     */
    Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard.index');

    /**
      * Category
      *
    */
    Route::resource('category', 'CategoryController')->names('admin.category')->parameters([
        'category'=>'id',
    ])->except('show');
    Route::group(['prefix' => 'category'], function () {
        Route::get('active/{id}', 'CategoryController@active')->name('admin.category.active');
        Route::get('unactive/{id}', 'CategoryController@unactive')->name('admin.category.unactive');
        
        Route::post('store-brand','CategoryController@storeBrand')->name('admin.category.storeBrand');
        Route::get('del-brand-cate/{id}','CategoryController@deleteBrand')->name('admin.category.deleteBrand');
    });

    /**
      * Banner
    */
    Route::resource('banner', 'BannerController')->names('admin.banner')->parameters([
        'banner'=>'id',
    ])->except('show');
    Route::group(['prefix' => 'banner'], function () {
        Route::get('/active/{id}', 'BannerController@active')->name('admin.banner.active');
        Route::get('/unactive/{id}', 'BannerController@unactive')->name('admin.banner.unactive');
    });

    /**
     * User
     */
    Route::resource('user', 'UserController')->names('admin.user')->parameters([
        'user' =>'id'
    ]);
    Route::group(['prefix' => 'user'], function () {
        Route::get('active/{id}', 'UserController@active')->name('admin.user.active');
        Route::get('unactive/{id}', 'UserController@unactive')->name('admin.user.unactive');
    });
    Route::get('change-password/{id}','UserController@changePassword')->name('admin.user.changePassword');
    Route::post('post-change-pw','UserController@updatePassword')->name('admin.user.updatePassword');

    /**
     * Product
     * 
     */
    Route::resource('product', 'ProductController')->names('admin.product')->parameters([
        'product'=>'id',
    ])->except('show');

    Route::group(['prefix' => 'product'], function () {
        Route::get('store-infor', 'ProductController@updateInfoProduct')->name('updateInfoProduct');
    });

    Route::group(['prefix' => 'image-product'], function () {
        Route::get('/{id}', 'ImageProductController@index')->name('admin.imageProduct.index');
        Route::post('/{id}', 'ImageProductController@store')->name('admin.imageProduct.store');
        Route::delete('/{id}', 'ImageProductController@destroy')->name('admin.imageProduct.destroy');
        Route::get('update-image-product/{id}/{status}', 'ImageProductController@update')->name('admin.imageProduct.changeAvatar');
        Route::get('change-avatar/{image_id}/{products_id}', 'ImageProductController@changeAvatar')->name('admin.imageProduct.changeAvatar');
    });

    /**
     * Brand of product
     * 
     */
    Route::resource('brand', 'BrandController')->names('admin.brand')->parameters([
        'brand'=>'id',
    ])->except('show');

    /**
     * Bill
     * 
     */
    Route::resource('bill', 'BillController')->names('admin.bill')->parameters([
        'bill'=>'id',
    ])->except('edit','create','store');

    /**
     * News
     * 
     */
    Route::resource('news', 'NewsController')->names('admin.news')->parameters([
        'news'=>'id'
    ])->except('show');
    Route::group(['prefix'=>'news'],function(){
        Route::get('active/{id}','NewsController@active')->name('admin.news.active');
        Route::get('unactive/{id}','NewsController@unactive')->name('admin.news.unactive');
    });

    /**
     * contact
     */
    Route::resource('contact', 'ContactController')->names('admin.contact')->parameters(['contact'=>'id'])->only('index','destroy');
    Route::get('reply-contact','ContactController@reply')->name('admin.contact.reply');
    
    /**
     * seach
     */
    Route::group(['prefix' => 'seach'], function () {
        Route::get('bill','SeachController@getBill')->name('seachBill');
        Route::get('products','SeachController@getProducts')->name('seachProducts');
    });

    /**
     * Menu
     */
    Route::resource('menu', 'MenuController')->names('admin.menu')->parameters(['menu'=>'id'])->except('show');
    Route::post('menu/active','MenuController@active')->name('admin.menu.active');
    Route::post('menu/unactive','MenuController@unactive')->name('admin.menu.unactive');
});

//Route fontend
Route::get('test', function () {
    return view('fontend.master.master');
});
Route::group(['namespace' => 'FontEnd'], function () {
    //single product
    Route::get('product-detail/{id}', 'ProductDetailController@getProductDetail')->name('getProductSingle');

    // home
    Route::get('/', 'HomeController@index')->name('index');
    //sign up
    Route::get('/user-sign-up', 'UserController@user_signup')->name('user-sign-up');
    Route::post('/post-user-sign-up', 'UserController@post_user_signup')->name('post-user-signup');
    //login
    Route::get('/user-login', 'UserController@user_login')->name('user-login');
    Route::post('/post-user-login', 'UserController@post_user_login')->name('post-user-login');
    Route::get('/user-infor/{id}/', 'UserController@user_infor')->name('user-infor');
    Route::post('/post-infor/{id}/', 'UserController@post_user_infor')->name('post-infor');
    //logout
    Route::get('/user-logout', 'UserController@user_logout')->name('user-logout');

    //danh sách sản phẩm theo thương hiệu
    Route::get('/brand/{idCategory}/{idBrand?}', 'BrandController@product_of_brand')->name('brand');
    
    
    //danh sách sản phẩm
    Route::group(['prefix'=>'product'],function(){
        Route::get('male-product', 'ProductController@all_male_product')->name('male-product');
        Route::get('male-product-{id}', 'ProductController@all_male_product_brand')->name('male-product/');
        Route::get('female-product', 'ProductController@all_female_product')->name('female-product');
        Route::get('female-product-{id}', 'ProductController@all_female_product_brand')->name('female-product/');
    });
    

    //tin tức
    Route::get('/new','NewController@all_new')->name('all-new');
    Route::get('detail-new-{id}','NewController@detail_new')->name('detail-new');

    //liên hệ
    Route::get('/contact','ContactController@contactPage')->name('contact');
    Route::post('/contact','ContactController@post_contact')->name('post-contact');

    //route function cart
    Route::group(['prefix' => 'cart'], function () {
        Route::get('list', 'CartController@getCart')->name('getCart');
        Route::get('add', 'CartController@add')->name('addCart');
        Route::get('update', 'CartController@updateCart')->name('updateCart');
        Route::get('delete/{products_id}', 'CartController@delete')->name('deleteCart');
    });

    //create bill
    Route::group(['prefix' => 'bill'], function () {
        Route::post('create', 'BillFontEndController@create')->name('createBill');
    });

    //seach
    Route::get('seach','SeachFontEndController@getSeach')->name('seachFE');
    //show bill user
    Route::group(['prefix' => 'bill'], function () {
        Route::get('/{id}','BillFontEndController@getBillUser')->name('getBillUser');
    });
    //delete comment
    Route::group(['prefix' => 'comment'], function () {
        Route::get('delete/{id}','CommentController@delete')->name('deleteComment');
        Route::get('deleteReply/{id}','CommentController@deleteReply')->name('deleteReplyComment');
    });
});
//ajax
Route::group(['namespace' => 'Ajax'], function () {
    Route::group(['prefix' => 'ajax'], function () {
        Route::get('/', 'AjaxFontEndController@index');
        Route::group(['prefix' => 'comment'], function () {
            Route::get('add', 'AjaxFontEndController@addComment')->name('addComment');
            Route::get('addreply', 'AjaxFontEndController@addReplyComment')->name('addReplyComment');
        });
        //check email
        Route::post('check-email', 'AjaxFontEndController@checkEmail')->name('checkEmail');
        //backend
        Route::get('brand','AjaxBachEndController@getBrand');
    });
});
