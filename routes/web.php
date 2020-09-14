<?php

use App\Http\Controllers\Admin\HomeAdmin;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;
use App\Models\Products;

// Route backend
Route::get('admin-login', 'Admin\HomeController@adminlogin');
Route::post('admin-login', 'Admin\HomeController@postadminlogin')->name('postadminlogin');
Route::get('admin-logout', 'Admin\HomeController@logout')->name('adminlogout');

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'adminlogin'], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/', function () {
        return redirect(route('dashboard'));
    });

    //Category
    Route::group(['prefix' => 'category'], function () {
        Route::get('add-category', 'CategoryController@add_category')->name('add-category');
        Route::post('add-category', 'CategoryController@post_add_category')->name('post-add-category');
        Route::get('all-category', 'CategoryController@all_category')->name('all-category');
        Route::get('/edit-category/{id}', 'CategoryController@edit_category')->name('edit-category');
        Route::post('edit-category/{id}', 'CategoryController@post_edit_category')->name('post-edit-category');
        Route::get('delete-category/{id}', 'CategoryController@delete_category')->name('delete-category');
        Route::get('active/{id}', 'CategoryController@active_category')->name('active-category');
        Route::get('unactive/{id}', 'CategoryController@unactive_category')->name('unactive-category');
        //brand
        Route::post('store-brand','CategoryController@storeBrand')->name('store-brand');
        Route::get('del-brand-cate/{idCate}/{idBrand}','CategoryController@deleteBrand')->name('delBrandCate');
    });
    //Banner
    Route::group(['prefix' => 'banner'], function () {
        Route::get('/add-banner', 'BannerController@add_banner')->name('add-banner');
        Route::post('/add-banner', 'BannerController@post_add_banner')->name('post_add_banner');
        Route::get('/all-banner', 'BannerController@all_banner')->name('all-banner');
        Route::get('/status/{id}', 'BannerController@active_banner')->name('active_banner');
        Route::get('/status1/{id}', 'BannerController@unactive_banner')->name('unactive_banner');
        Route::get('/edit-banner/{id}', 'BannerController@edit_banner')->name('edit-banner');
        Route::post('/edit-banner/{id}', 'BannerController@post_edit_banner')->name('edit-banner');
        Route::get('/delete-banner/{id}', 'BannerController@delete_banner')->name('delete-banner');
    });


    //User
    Route::group(['prefix' => 'user'], function () {
        Route::get('add-user', 'UserController@add_user')->name('add-user');
        Route::post('add-user', 'UserController@post_add_user')->name('post-add-user');
        Route::get('all-user', 'UserController@all_user')->name('all-user');
        Route::get('active-admin/{id}', 'UserController@active_admin')->name('active-admin');
        Route::get('unactive-admin/{id}', 'UserController@unactive_admin')->name('unactive-admin');
        Route::get('edit-user/{id}', 'UserController@edit_user')->name('edit-user');
        Route::post('post-edit-user/{id}', 'UserController@post_edit_user')->name('post-edit-user');
        Route::get('delete-user/{id}', 'UserController@delete_user')->name('deleteUser');
    });
    Route::get('detail-user/{id}','UserController@getDetailUser')->name('getDetailUser');
    Route::get('change-password/{id}','UserController@getChangePassword')->name('getChangePW');
    Route::post('post-change-pw','UserController@postChangePassword')->name('postChangePW');

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
        Route::get('store-infor', 'ProductController@updateInfoProduct')->name('updateInfoProduct');

        //edit image product
        Route::get('image-product/{id}', 'ImageProductController@index')->name('imageProduct');
        Route::post('add-image-product/{id}', 'ImageProductController@store')->name('addImageProduct');
        Route::get('del-image-product/{id}', 'ImageProductController@delete')->name('delImageProduct');
        Route::get('update-image-product/{id}/{status}', 'ImageProductController@update')->name('updateImageProduct');

        //change avatar
        Route::get('change-avatar/{image_id}/{products_id}', 'ImageProductController@changeAvatar')->name('changeAvatar');
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
    // bill
    Route::group(['prefix' => 'bill'], function () {
        Route::get('list', 'BillController@getListBill')->name('listBill');
        Route::get('detail/{id}', 'BillController@getDetailBill')->name('detailBill');
        Route::post('update/{id}', 'BillController@updateBill')->name('updateBill');
        Route::get('deletebill/{id}','BillController@delete')->name('deleteBill');
    });
    //News
    Route::group(['prefix'=>'new'],function(){
        Route::get('add-new','NewsController@add_new')->name('add-news');
        Route::post('add-new','NewsController@store')->name('post-new');
        Route::get('all-new','NewsController@all_new')->name('list-news');
        Route::get('active/{id}','NewsController@active')->name('active');
        Route::get('unactive/{id}','NewsController@unactive')->name('un-active');
        Route::get('edit-new/{id}','NewsController@edit')->name('edit');
        Route::post('edit-new/{id}','NewsController@update')->name('update-news');
        Route::get('delete/{id}','NewsController@delete')->name('delete');

    });
    Route::get('all-contact','ContactController@all_contact')->name('all-contact');
    Route::get('/delete-con-{id}','ContactController@delete_contact')->name('delete-contact');
    Route::get('reply-contact','ContactController@reply_contact')->name('reply-contact');
    //Seach
    Route::group(['prefix' => 'seach'], function () {
        Route::get('bill','SeachController@getBill')->name('seachBill');
        Route::get('products','SeachController@getProducts')->name('seachProducts');
    });
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
    Route::get('/brand/{id}', 'BrandController@product_of_brand')->name('brand');
    
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
//ajax fontend
Route::group(['namespace' => 'Ajax'], function () {
    Route::group(['prefix' => 'ajax'], function () {
        Route::get('/', 'AjaxFontEndController@index');
        Route::group(['prefix' => 'comment'], function () {
            Route::get('add', 'AjaxFontEndController@addComment')->name('addComment');
            Route::get('addreply', 'AjaxFontEndController@addReplyComment')->name('addReplyComment');
        });
        //check email
        Route::post('check-email', 'AjaxFontEndController@checkEmail')->name('checkEmail');
    });
});