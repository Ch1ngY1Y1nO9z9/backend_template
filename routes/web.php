<?php

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

// 網站前台
// Route::get('/', function () {
//     return view('/welcome');
// })->name('index');
Route::get('/', 'FrontController@index');
Route::get('/about_us', 'FrontController@about_us');
Route::post('/contact_us', 'FrontController@contact_us');
Route::get('/news', 'FrontController@news');
Route::get('/news/{id}', 'FrontController@news_detail');
Route::get('/Types/{id}', 'FrontController@Types');
Route::get('/Products/{id}', 'FrontController@Products');

// Auth::routes();
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
// Route::get('password/reset', 'Auth\ResetPasswordController@showResetForm');
// Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/admin', 'HomeController@index')->name('home');


// 網站後台
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/', 'HomeController@index');

    Route::get('/resetPassword', "HomeController@resetPassword");
    Route::post('/resetPassword', "HomeController@reset");

    Route::post('/img/post','HomeController@image_post');

    //SEO設定
    Route::get('/seo', 'SeoController@index');
    Route::put('/seo', 'SeoController@update');

    //about
    Route::get('about_us', 'AboutController@index');
    Route::put('about_us', 'AboutController@update');

    // Banner
    Route::get('banner/create','BannerController@create');
    Route::apiResource('banner','BannerController');


    //supplier
    Route::get('supplier/create','SupplierController@create');
    Route::apiResource('supplier','SupplierController');

    //product_video
    Route::get('product_video/create','ProductVideoController@create');
    Route::apiResource('product_video','ProductVideoController');


    //partner
    Route::get('partner/create','PartnerController@create');
    Route::apiResource('partner','PartnerController');

    // 最新消息
    Route::get('news/create','NewsController@create');
    Route::apiResource('/news','NewsController');

    //聯絡我們管理
    Route::get('contact','ContactController@index');
    Route::get('contact/{id}','ContactController@show');
    Route::delete('contact/{id}','ContactController@delete');
    // Route::post('contact/delete_all/','ContactController@delete_all')->name('clear_contact');

    //產品類別管理
    Route::get('product_type/create','ProductTypeController@create');
    Route::apiResource('product_type','ProductTypeController');

    //產品管理
    Route::get('products/create','ProductsController@create');
    Route::apiResource('products','ProductsController');;
});
