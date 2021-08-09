<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'FeedController@feed')->name('index');
