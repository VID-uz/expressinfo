<?php
/**
 * Created by PhpStorm.
 * User: Asad
 * Date: 08.08.2019
 * Time: 10:39
 */

Route::middleware('admin.user')->prefix('customer')->namespace('User')->group(function (){

    Route::get('/', 'DashboardController@dashboard')->name('admin.user.index');

    Route::resource('/ads', 'CatalogController');


    Route::get('/statistic/{id}', 'StatisticController@statistic')->name('admin.user.statistic');

});