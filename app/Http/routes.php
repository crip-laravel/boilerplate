<?php

use Mcamara\LaravelLocalization\LaravelLocalization;

Route::group(['prefix' => app(LaravelLocalization::class)->setLocale()], function () {
    /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/

    // Home routes
    Route::get('/', 'HomeController@getIndex');
    Route::get('/home', 'HomeController@getIndex');

    // Authentication routes...
    Route::get('auth/login', 'Auth\AuthController@getLogin');
    Route::post('auth/login', 'Auth\AuthController@postLogin');
    Route::get('auth/logout', 'Auth\AuthController@getLogout');

    // Registration routes...
    Route::get('auth/register', 'Auth\AuthController@getRegister');
    Route::post('auth/register', 'Auth\AuthController@postRegister');

    // Social Authentication routes...
    Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');
    Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');

    // Dashboard routes...
    Route::get('dashboard', 'DashboardController@getIndex');
});


