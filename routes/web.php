<?php

use App\Http\Controllers\Admin\HomeAdmin;
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
    
    //Product: add new product, show list product, edit product, add and edit image product 
    Route::group(['prefix' => 'product'], function () {
        Route::get('add', 'ProductController@addProduct')->name('addProduct');
        Route::post('get-product', 'ProductController@getProduct')->name('getProduct');
        
    });
});

//Route fontend
