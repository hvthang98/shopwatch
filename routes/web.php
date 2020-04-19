<?php

use App\Http\Controllers\Admin\HomeAdmin;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('backend.page.dashboard');
});

// Route backend
Route::get('admin-login', 'Admin\HomeController@adminlogin');
Route::post('admin-login', 'Admin\HomeController@postadminlogin')->name('postadminlogin');
Route::get('admin-logout', 'Admin\HomeController@logout')->name('adminlogout');

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'adminlogin'], function () {
    //Route::get('dashboard', 'Dashboard@index');
    Route::get('dashboard', 'HomeController@index')->name('dashboard');
    Route::get('/', function () {
        return redirect(route('dashboard'));
    });

    //Category
    Route::group(['prefix'=>'category'],function(){
        Route::get('add-category','CategoryController@add_category')->name('add-category');
        Route::post('add-category','CategoryController@post_add_category')->name('post-add-category');
        Route::get('all-category','CategoryController@all_category')->name('all-category');
        Route::get('/edit-category/{id}', 'CategoryController@edit_category')->name('edit-category');
        Route::post('edit-category/{id}', 'CategoryController@post_edit_category')->name('post-edit-category');
        Route::get('delete-category/{id}','CategoryController@delete_category')->name('delete-category');
        Route::get('active/{id}','CategoryController@active_category')->name('active-category');
        Route::get('unactive/{id}','CategoryController@unactive_category')->name('unactive-category');
    });
    //Banner
    Route::group(['prefix'=>'banner'],function(){
        Route::get('/add-banner', 'BannerController@add_banner')->name('add-banner');
        Route::post('/add-banner', 'BannerController@post_add_banner')->name('post_add_banner');
        Route::get('/all-banner', 'BannerController@all_banner')->name('all-banner');
        Route::get('/status/{id}', 'BannerController@active_banner')->name('active_banner');
        Route::get('/status1/{id}', 'BannerController@unactive_banner')->name('unactive_banner');
        Route::get('/edit-banner/{id}', 'BannerController@edit_banner')->name('edit-banner');
        Route::post('/edit-banner/{id}', 'BannerController@post_edit_banner')->name('edit-banner');
        Route::get('/delete-banner/{id}', 'BannerController@delete_banner')->name('delete-banner');
    });
    
    
    //Product: add new product, show list product, edit product, add and edit image product 
    Route::group(['prefix' => 'product'], function () {
        // add product
        Route::get('add', 'ProductController@getAddProduct')->name('addProduct');
        Route::post('post-product', 'ProductController@postProduct')->name('postProduct');

        //show list product
        Route::get('list-product', 'ProductController@getListProduct')->name('listProduct');
        Route::get('edit-product/{id}', 'ProductController@getEditProduct')->name('editProduct');
        Route::get('del-product/{id}', 'ProductController@delProduct')->name('delProduct');
        Route::get('update-product/{id}', 'ProductController@updateProduct')->name('updateProduct');
        Route::get('update-info-product/{id}', 'ProductController@updateInfoProduct')->name('updateInfoProduct');

        //edit image product
        Route::get('image-product/{id}', 'ProductController@getImageProduct')->name('imageProduct');
        Route::post('add-image-product/{id}', 'ProductController@addImageProuct')->name('addImageProduct');
        Route::get('del-image-product/{id}', 'ProductController@delImageProduct')->name('delImageProduct');
        Route::get('update-image-product/{id}/{status}', 'ProductController@updateTmageProduct')->name('updateImageProduct');

        //change avatar
        Route::get('change-avatar/{image_id}/{products_id}', 'ProductController@changeAvatar')->name('changeAvatar');
    });

    // brand: add, edit/update , delete
    Route::group(['prefix' => 'brand'], function () {
        Route::get('add', 'BrandController@getAddBrand')->name('addBrand');
        Route::post('post', 'BrandController@postBrand')->name('postBrand');
        Route::get('list', 'BrandController@getListBrand')->name('listBrand');
        Route::get('edit/{id}', 'BrandController@getEditBrand')->name('editBrand');
        Route::get('update/{id}', 'BrandController@updateBrand')->name('updateBrand');
        Route::get('delete/{id}', 'BrandController@delBrand')->name('deleteBrand');
    });
});

//Route fontend
Route::get('test', function () {
    return view('fontend.master.master');
});
