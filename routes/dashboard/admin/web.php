<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Admin\HomeController;


Route::controller(HomeController::class)->group(function () {

    Route::get('/', 'index')->name('index');
    Route::get('language/{language:code}', 'changeLanguage')->name('changeLanguage');
    Route::get('changeMode/{mode}', 'changeMode')->name('changeMode');

});