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

Route::get('/cgu_info', 'Front\CguController@cguInfo')->name('home.cgu.info');
Route::get('/cgu_info/{id}', 'Front\CguController@cguCategory')->name('home.cgu.info.category');
Route::get('/cgu_ad', 'Front\CguController@cguAd')->name('home.cgu.ad');
Route::get('/cgu_ad/{id}', 'Front\CguController@cguCategory')->name('home.cgu.ad.category');

Route::get('/categories', 'Front\CatalogController@categories')->name('home.categories2');
Route::get('/test', 'Front\HomeController@test')->name('test');
Route::get('/category/{id}', 'Front\CatalogController@category')->name('home.category');
Route::get('/catalog/{id}', 'Front\CatalogController@catalog')->name('home.catalog');
Route::get('/catalog/{id}/single', 'Front\CatalogController@catalogSingle')->name('home.catalog.single');
Route::get('/catalog/{id}/second', 'Front\CatalogController@catalog2')->name('home.catalog.second');
Route::get('/tags/{category_id}/{tag_id}', 'Front\CatalogController@categoryCatalogTags')->name('home.tag.catalogs');
Route::post('/search', 'Front\CatalogController@search')->name('home.search');
Route::post('/save/data', 'Front\CatalogController@saveData')->name('home.save');

Route::post('/check_cookie', 'Front\HomeController@checkCookie')->name('home.cookie');
Route::get('/redirect', 'Front\HomeController@redirect')->name('home.redirect');


include __DIR__ . '/admin/admin.php';
include __DIR__ . '/admin/customer.php';
include __DIR__ . '/admin/login.php';








