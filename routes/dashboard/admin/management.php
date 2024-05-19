<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Dashboard\Admin\Managements\LanguageController;
use App\Http\Controllers\Dashboard\Admin\Managements\AdminController;
use App\Http\Controllers\Dashboard\Admin\Managements\RoleController;

//admins
Route::controller(AdminController::class)
    ->prefix('admins')->name('admins.')
    ->group(function () {

        Route::get('data', 'data')->name('data');
        Route::post('status', 'status')->name('status');
        Route::delete('bulk_delete', 'bulkDelete')->name('bulk_delete');

    });
Route::resource('admins', AdminController::class);

//roles
Route::controller(RoleController::class)
    ->prefix('roles')->name('roles.')
    ->group(function () {

        Route::get('data', 'data')->name('data');
        Route::post('status', 'status')->name('status');
        Route::delete('bulk_delete', 'bulkDelete')->name('bulk_delete');

    });
Route::resource('roles', RoleController::class);

//languages
Route::controller(LanguageController::class)
    ->prefix('languages')->name('languages.')
    ->group(function () {

        Route::get('data', 'data')->name('data');
        Route::post('default', 'changeDefault')->name('default');
        Route::post('status', 'status')->name('status');
        Route::delete('bulk_delete', 'bulkDelete')->name('bulk_delete');

    });
Route::resource('languages', LanguageController::class);