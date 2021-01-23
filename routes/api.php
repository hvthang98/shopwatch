<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group(['namespace' => 'Api'], function () {
    Route::apiResource('/product', 'ProductController')->parameters([
        'product' => 'id',
    ]);
    Route::post('/product/infor', 'ProductController@storeInfor')->name('product.storeInfor');
    Route::apiResource('/category', 'CategoryController')->parameters([
        'category' => 'id',
    ]);
    Route::apiResource('/brand', 'BrandController')->parameters([
        'brand' => 'id',
    ]);
    Route::apiResource('/menu', 'MenuController')->parameters([
        'menu' => 'id',
    ]);
    Route::get('/menu/brand/{id}', 'MenuController@getBrand')->name('menu.getBrand');
    Route::get('/menu/category/{id}', 'MenuController@getCategory')->name('menu.getCategory');
    Route::post('/menu/brand/create', 'MenuController@storeBrand')->name('menu.storeBrand');
    Route::post('/menu/category/create', 'MenuController@storeCategory')->name('menu.storeCategory');
});
