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
    Route::apiResource('/product','ProductController')->parameters([
        'product'=>'id',
    ]);
    Route::apiResource('/category','CategoryController')->parameters([
        'category'=>'id',
    ]);
    Route::apiResource('/brand','BrandController')->parameters([
        'brand'=>'id',
    ]);
    Route::post('brand/category','BrandController@storeForeignCategory')->name('brand.storeForeignCategory');
});