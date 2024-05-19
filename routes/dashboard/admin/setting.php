<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Admin\Setting\WebsitController;
use App\Http\Controllers\Dashboard\Admin\Setting\MetaController;
use App\Http\Controllers\Dashboard\Admin\Setting\MediaController;
use App\Http\Controllers\Dashboard\Admin\Setting\ContactController;


Route::controller(WebsitController::class)
        ->prefix('website')->name('website.')->group(function () {

    Route::get('/', 'index')->name('index');
    Route::post('store', 'store')->name('store');

});

Route::controller(MetaController::class)
        ->prefix('meta')->name('meta.')->group(function () {

    Route::get('/', 'index')->name('index');
    Route::post('store', 'store')->name('store');

});

Route::controller(MediaController::class)
        ->prefix('media')->name('media.')->group(function () {

    Route::get('/', 'index')->name('index');
    Route::post('store', 'store')->name('store');

});

Route::controller(ContactController::class)
        ->prefix('contact')->name('contact.')->group(function () {

    Route::get('data', 'data')->name('data');
    Route::post('status', 'status')->name('status');
    Route::delete('bulk_delete', 'bulkDelete')->name('bulk_delete');

});
Route::resource('contact', ContactController::class)->except('create', 'store', 'edit', 'update');;