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
    Route::get('/', function () {
        return redirect(route('dashboard'));
    });
    Route::get('dashboard', 'HomeController@index')->name('dashboard');

    //Product: add new product, show list product, edit product, add and edit image product 
    Route::group(['prefix' => 'product'], function () {
        // add product
        Route::get('add', 'ProductController@getAddProduct')->name('addProduct');
        Route::post('post-product', 'ProductController@postProduct')->name('postProduct');

        //show list product
        Route::get('list-product', 'ProductController@getListProduct')->name('listProduct');
        Route::get('edit-product/{id}','ProductController@getEditProduct')->name('editProduct');
        Route::get('del-product/{id}','ProductController@delProduct')->name('delProduct');
        Route::get('update-product/{id}','ProductController@updateProduct')->name('updateProduct');
        Route::get('update-info-product/{id}','ProductController@updateInfoProduct')->name('updateInfoProduct');

        //edit image product
        Route::get('image-product/{id}', 'ProductController@getImageProduct')->name('imageProduct');
        Route::post('add-image-product/{id}','ProductController@addImageProuct')->name('addImageProduct');
        Route::get('del-image-product/{id}', 'ProductController@delImageProduct')->name('delImageProduct');
        Route::get('update-image-product/{id}/{status}','ProductController@updateTmageProduct')->name('updateImageProduct');

        //change avatar
        Route::get('change-avatar/{image_id}/{products_id}','ProductController@changeAvatar')->name('changeAvatar');
        
    });
});

//Route fontend
