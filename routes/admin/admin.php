<?php
/**
 * Created by PhpStorm.
 * User: Asad
 * Date: 08.08.2019
 * Time: 10:39
 */

Route::middleware('admin.auth')->prefix('admin')->namespace('Admin')->group(function (){

    Route::get('/', 'DashboardController@dashboard')->name('admin.index');


    Route::resource('/catalog', 'CatalogController');
    Route::resource('/catalogtags', 'TagsController');

    Route::resource('/cgucatalogs', 'CguCatalogController');
    Route::resource('/cgucategories', 'CguCategoryController');
    Route::resource('/cgusites', 'CguSiteController');
    Route::get('/cgucategories/{id}/categories', 'CguCategoryController@categories')->name('cgucategories.categories');
    Route::get('/cgucategories/{id}/sites', 'CguCategoryController@sites')->name('cgucategories.sites');

    Route::resource('/catalogcategories', 'CatalogCategoriesController');
    Route::get('/catalogcategories/{id}/categories', 'CatalogCategoriesController@categories')->name('catalogcategories.categories');
    Route::get('/catalogcategories/{id}/catalogs', 'CatalogCategoriesController@catalogs')->name('catalogcategories.catalogs');

    Route::resource('/users', 'UserController');
    Route::put('/users/{id}/changePassword', 'UserController@passwordChange')->name('users.change.password');


    Route::get('/dashboard/to/another/color', 'DashboardController@dashboardColorChange')->name('admin.dashboard.color.change');
    Route::post('/change/position', 'DashboardController@changePosition')->name('admin.category.change.position');
    Route::post('/change/position/2', 'DashboardController@changePosition2')->name('admin.category.change.position2');
    Route::post('/change/position/site', 'DashboardController@changePositionSite')->name('admin.category.change.position.site');
    Route::post('/search/catalog', 'DashboardController@searchCatalog')->name('admin.search.catalog');
    Route::get('/remove/image/{id}', 'DashboardController@removeImage')->name('remove.ad.image');
    Route::get('/catalog/{id}/delete', 'DashboardController@removeCatalog')->name('remove.catalog');

});
