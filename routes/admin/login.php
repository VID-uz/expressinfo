<?php
/**
 * Created by PhpStorm.
 * User: Asad
 * Date: 08.08.2019
 * Time: 10:39
 */

Route::prefix('login')->group(function (){
    //Admin
    Route::get('/admin', 'AdminAuth\LoginController@showLoginForm')->name('admin.loginForm');
    Route::post('/admin', 'AdminAuth\LoginController@login')->name('admin.login');

    //Front
    Route::get('/', 'CustomerAuth\LoginController@showLoginForm')->name('admin.user.loginForm');
    Route::post('/', 'CustomerAuth\LoginController@login')->name('admin.user.login');;

});


// CustomerAuthentication Routes...
Route::post('logout', 'CustomerAuth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'CustomerAuth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'CustomerAuth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'CustomerAuth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'CustomerAuth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'CustomerAuth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'CustomerAuth\ResetPasswordController@reset');

Route::get('/home', 'HomeController@index')->name('home');