<?php

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

Route::get('/saveData2', 'Front\HomeController@saveData2')->name('home.saveData2');
Route::get('/', 'Front\HomeController@mobile')->name('home.categories');
Route::get('/mobile', 'Front\HomeController@mobile')->name('home.mobile');

Route::get('/cgu_info', 'Front\HomeController@cguInfo')->name('home.cgu.info');
Route::get('/cgu_info/{id}', 'Front\HomeController@cguInfoCategory')->name('home.cgu.info.category');
Route::get('/cgu_ad', 'Front\HomeController@cguAd')->name('home.cgu.ad');


Route::get('/cgu/centers', 'Front\HomeController@cguCenters')->name('home.cgu.centers');
Route::get('/cgu/centers/{id}', 'Front\HomeController@cguCenter')->name('home.cgu.center');
Route::get('/categories', 'Front\HomeController@categories')->name('home.categories2');
Route::get('/category/{id}', 'Front\HomeController@category')->name('home.category');
Route::get('/catalog/{id}', 'Front\HomeController@catalog')->name('home.catalog');
Route::get('/catalog/{id}/single', 'Front\HomeController@catalogSingle')->name('home.catalog.single');
Route::get('/catalog/{id}/second', 'Front\HomeController@catalog2')->name('home.catalog.second');
Route::get('/tags/{category_id}/{tag_id}', 'Front\HomeController@categoryCatalogTags')->name('home.tag.catalogs');
Route::post('/search', 'Front\HomeController@search')->name('home.search');
Route::post('/save/data', 'Front\HomeController@saveData')->name('home.save');
Route::post('/check_cookie', 'Front\HomeController@checkCookie')->name('home.cookie');
//Route::get('/cgu_ads', 'Front\HomeController@cgu')->name('home.cgu');
//Route::get('/cgu_info', 'Front\HomeController@cgu_info')->name('home.cgu_info');
//Route::get('/cgu_info_inner', 'Front\HomeController@cgu_info_inner')->name('home.cgu_info_inner');
//Route::get('/diagram_cgu_info_inner', 'Front\HomeController@diagram_cgu_info_inner')->name('home.diagram_cgu_info_inner');
//Route::get('/cgu_info_buildings', 'Front\HomeController@cguInfoBuildings')->name('home.cgu_info.buildings');


Route::get('/redirect', 'Front\HomeController@redirect')->name('home.redirect');


Route::prefix('login')->group(function (){
    //Admin
    Route::get('/admin', 'AdminAuth\LoginController@showLoginForm')->name('admin.loginForm');
    Route::post('/admin', 'AdminAuth\LoginController@login')->name('admin.login');

    //Front
    Route::get('/', 'FrontAuth\LoginController@showLoginForm')->name('admin.user.loginForm');
    Route::post('/', 'FrontAuth\LoginController@login')->name('admin.user.login');;

});

Route::middleware('admin.auth')->prefix('admin')->namespace('Admin')->group(function (){

    Route::get('/', 'DashboardController@dashboard')->name('admin.index');


    Route::resource('/catalog', 'CatalogController');
    Route::resource('/tags', 'TagsController');
    
    Route::resource('/cgucatalogs', 'CguCatalogController');
    Route::resource('/cgucategories', 'CguCategoryController');
    Route::resource('/cgusites', 'CguSiteController');
    Route::get('/cgucategories/{id}/categories', 'CguCategoryController@categories')->name('cgucategories.categories');

    Route::resource('/catalogcategories', 'CatalogCategoriesController');
    Route::get('/catalogcategories/{id}/categories', 'CatalogCategoriesController@categories')->name('catalogcategories.categories');
    Route::get('/catalogcategories/{id}/catalogs', 'CatalogCategoriesController@catalogs')->name('catalogcategories.catalogs');

    Route::resource('/users', 'UserController');
    Route::put('/users/{id}/changePassword', 'UserController@passwordChange')->name('users.change.password');


    Route::get('/dashboard/to/another/color', 'DashboardController@dashboardColorChange')->name('admin.dashboard.color.change');
    Route::post('/change/position', 'DashboardController@changePosition')->name('admin.category.change.position');
    Route::post('/change/position/2', 'DashboardController@changePosition2')->name('admin.category.change.position2');

});

Route::middleware('admin.user')->prefix('customer')->namespace('User')->group(function (){

    Route::get('/', 'DashboardController@dashboard')->name('admin.user.index');

    Route::resource('/ads', 'CatalogController');


    Route::get('/statistic/{id}', 'StatisticController@statistic')->name('admin.user.statistic');

});




// FrontAuthentication Routes...
Route::post('logout', 'FrontAuth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'FrontAuth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'FrontAuth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'FrontAuth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'FrontAuth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'FrontAuth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'FrontAuth\ResetPasswordController@reset');

Route::get('/home', 'HomeController@index')->name('home');
