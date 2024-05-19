<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Dashboard\Admin\App\Location\CityController;
use App\Http\Controllers\Dashboard\Admin\App\Location\RegionController;

use App\Http\Controllers\Dashboard\Admin\App\UserController;
use App\Http\Controllers\Dashboard\Admin\App\CategoryController;
use App\Http\Controllers\Dashboard\Admin\App\TransportTypeController;

use App\Http\Controllers\Dashboard\Admin\App\Trip\AllController;
use App\Http\Controllers\Dashboard\Admin\App\Trip\AdController;
use App\Http\Controllers\Dashboard\Admin\App\Trip\CustomerController;
use App\Http\Controllers\Dashboard\Admin\App\Trip\CompanyController;
use App\Http\Controllers\Dashboard\Admin\App\Trip\DriverController;


Route::prefix('users')->name('users.')->group(function () {

    //trips customers
    Route::controller(\App\Http\Controllers\Dashboard\Admin\App\User\AllController::class)
        ->prefix('all')->name('all.')
        ->group(function () {

            Route::get('data', 'data')->name('data');
            Route::post('status', 'status')->name('status');
            Route::delete('bulk_delete', 'bulkDelete')->name('bulk_delete');

        });
    Route::resource('all', \App\Http\Controllers\Dashboard\Admin\App\User\AllController::class);

    //trips customers
    Route::controller(\App\Http\Controllers\Dashboard\Admin\App\User\CustomerController::class)
        ->prefix('customers')->name('customers.')
        ->group(function () {

            Route::get('data', 'data')->name('data');
            Route::get('{customer}/dataTrip', 'dataTrip')->name('dataTrip');
            Route::post('status', 'status')->name('status');
            Route::delete('bulk_delete', 'bulkDelete')->name('bulk_delete');

        });
    Route::resource('customers', \App\Http\Controllers\Dashboard\Admin\App\User\CustomerController::class);

    //trips drivers
    Route::controller(\App\Http\Controllers\Dashboard\Admin\App\User\DriverController::class)
        ->prefix('drivers')->name('drivers.')
        ->group(function () {

            Route::get('data', 'data')->name('data');
            Route::get('{driver}/dataTrip', 'dataTrip')->name('dataTrip');
            Route::post('status', 'status')->name('status');
            Route::delete('bulk_delete', 'bulkDelete')->name('bulk_delete');

        });
    Route::resource('drivers', \App\Http\Controllers\Dashboard\Admin\App\User\DriverController::class);

    //trips companys
    Route::controller(\App\Http\Controllers\Dashboard\Admin\App\User\CompanyController::class)
        ->prefix('companies')->name('companys.')
        ->group(function () {

            Route::get('data', 'data')->name('data');
            Route::get('{company}/dataTrip', 'dataTrip')->name('dataTrip');
            Route::post('status', 'status')->name('status');
            Route::delete('bulk_delete', 'bulkDelete')->name('bulk_delete');

        });
    Route::resource('companys', \App\Http\Controllers\Dashboard\Admin\App\User\CompanyController::class);

    //trips employees
    Route::controller(\App\Http\Controllers\Dashboard\Admin\App\User\EmployeeController::class)
        ->prefix('employees')->name('employees.')
        ->group(function () {

            Route::get('data', 'data')->name('data');
            Route::get('{employee}/dataTrip', 'dataTrip')->name('dataTrip');
            Route::post('status', 'status')->name('status');
            Route::delete('bulk_delete', 'bulkDelete')->name('bulk_delete');

        });
    Route::resource('employees', \App\Http\Controllers\Dashboard\Admin\App\User\EmployeeController::class);

});//end of trips

Route::prefix('trips')->name('trips.')->group(function () {
    //trips all
    Route::controller(AllController::class)
        ->prefix('all')->name('all.')
        ->group(function () {

            Route::get('data', 'data')->name('data');
            Route::post('status', 'status')->name('status');
            Route::delete('bulk_delete', 'bulkDelete')->name('bulk_delete');

        });
    Route::resource('all', AllController::class);

    //trips ads
    Route::controller(AdController::class)
        ->prefix('ads')->name('ads.')
        ->group(function () {

            Route::get('data', 'data')->name('data');
            Route::post('status', 'status')->name('status');
            Route::delete('bulk_delete', 'bulkDelete')->name('bulk_delete');

        });
    Route::resource('ads', AdController::class);

    //trips customers
    Route::controller(CustomerController::class)
        ->prefix('customers')->name('customers.')
        ->group(function () {

            Route::get('data', 'data')->name('data');
            Route::post('status', 'status')->name('status');
            Route::delete('bulk_delete', 'bulkDelete')->name('bulk_delete');

        });
    Route::resource('customers', CustomerController::class);

    //trips companys
    Route::controller(CompanyController::class)
        ->prefix('companies')->name('companys.')
        ->group(function () {

            Route::get('data', 'data')->name('data');
            Route::post('status', 'status')->name('status');
            Route::delete('bulk_delete', 'bulkDelete')->name('bulk_delete');

        });
    Route::resource('companys', CompanyController::class);

    //trips drivers
    Route::controller(DriverController::class)
        ->prefix('drivers')->name('drivers.')
        ->group(function () {

            Route::get('data', 'data')->name('data');
            Route::post('status', 'status')->name('status');
            Route::delete('bulk_delete', 'bulkDelete')->name('bulk_delete');

        });
    Route::resource('drivers', DriverController::class);

});//end of trips

Route::prefix('locations')->name('locations.')->group(function () {

    //cities
    Route::controller(CityController::class)
        ->prefix('cities')->name('cities.')
        ->group(function () {

            Route::get('data', 'data')->name('data');
            Route::post('status', 'status')->name('status');
            Route::delete('bulk_delete', 'bulkDelete')->name('bulk_delete');

        });
    Route::resource('cities', CityController::class);


    //regions
    Route::controller(RegionController::class)
        ->prefix('regions')->name('regions.')
        ->group(function () {

            Route::get('data', 'data')->name('data');
            Route::post('status', 'status')->name('status');
            Route::delete('bulk_delete', 'bulkDelete')->name('bulk_delete');

        });
    Route::resource('regions', RegionController::class);

});//end of locationd

//categories
Route::controller(CategoryController::class)
    ->prefix('categories')->name('categories.')
    ->group(function () {

        Route::get('data', 'data')->name('data');
        Route::post('status', 'status')->name('status');
        Route::delete('bulk_delete', 'bulkDelete')->name('bulk_delete');

    });
Route::resource('categories', CategoryController::class);

//transport_types
Route::controller(TransportTypeController::class)
    ->prefix('transport_types')->name('transport_types.')
    ->group(function () {

        Route::get('data', 'data')->name('data');
        Route::post('status', 'status')->name('status');
        Route::delete('bulk_delete', 'bulkDelete')->name('bulk_delete');

    });
Route::resource('transport_types', TransportTypeController::class);