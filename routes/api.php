<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => '1.0',
    'namespace' => 'V1',
    'as' => 'v1.',

], function(){

    //Auth
    Route::group([
        'prefix' => 'auth',
        'namespace' => 'Auth',
        'as' => 'auth.',
    ], function(){

        Route::post('login', 'LoginController@login')->name('login');
        Route::post('register', 'RegisterController@register')->name('register');
    });

    Route::middleware('auth:api')->group(function () {

        // users
        Route::group(
            ['namespace' => 'User', 'prefix' => 'users', 'as' => 'users.'],
            base_path('routes/api/v1/user.php')
        );

    });

});
