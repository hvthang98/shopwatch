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
Route::get('admin-login','Admin\HomeController@adminlogin');
Route::post('admin-login','Admin\HomeController@postadminlogin')->name('postadminlogin');
Route::get('admin-logout','Admin\HomeController@logout')->name('adminlogout');

Route::group(['namespace' => 'Admin', 'prefix' => 'admin','middleware'=>'adminlogin'], function () {
    //Route::get('dashboard', 'Dashboard@index');
    Route::get('dashboard','HomeController@index')->name('dashboard');
    //Banner
    Route::get('/add-banner','BannerController@add_banner')->name('add-banner');
    Route::post('/add-banner','BannerController@post_add_banner')->name('post_add_banner');
    Route::get('/all-banner','BannerController@all_banner')->name('all-banner');
    Route::get('/sta/{id}','BannerController@active_banner')->name('active_banner');
    Route::get('/sta1/{id}','BannerController@unactive_banner')->name('unactive_banner');
    Route::get('/edit-banner/{id}','BannerController@edit_banner')->name('edit-banner');
    Route::post('/edit-banner/{id}','BannerController@post_edit_banner')->name('edit-banner');
    Route::get('/delete-banner/{id}','BannerController@delete_banner')->name('delete-banner');
});

//Route fontend
