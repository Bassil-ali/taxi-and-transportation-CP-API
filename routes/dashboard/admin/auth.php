<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Dashboard\Admin\Auth\LoginController;
use App\Http\Controllers\Dashboard\Admin\Auth\ProfileController;
use App\Http\Controllers\Dashboard\Admin\Auth\PasswordController;

Route::get('login', [LoginController::class, 'index'])->name('login.index');
Route::post('login/store', [LoginController::class, 'store'])->name('login.store');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');


Route::prefix('accounts')->name('accounts.')->group(function () {

	Route::prefix('profile')->name('profile.')
	->controller(ProfileController::class)->group(function () {

	    Route::get('edit', 'edit')->name('edit');
	    Route::put('{admin}/update', 'update')->name('update');

	});

	Route::prefix('password')->name('password.')
	->controller(PasswordController::class)->group(function () {

	    Route::get('edit', 'edit')->name('edit');
	    Route::post('update', 'update')->name('update');

	});

});