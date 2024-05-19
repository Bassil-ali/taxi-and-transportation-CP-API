<?php

use App\Http\Controllers\api\AdController;
use App\Http\Controllers\api\ApiAuthController;
use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\CityController;
use App\Http\Controllers\api\ContactUsController;
use App\Http\Controllers\api\ProposalAcceptedAdController;
use App\Http\Controllers\api\RegionController;
use App\Http\Controllers\api\SystemSettingController;
use App\Jobs\CitiesImport;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\api\TransportTypeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\api\TripController;
use App\Http\Controllers\WalletController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('contact-us' ,[ ContactUsController::class ,'store']);


//   Route::get('send-sms' ,[ ApiAuthController::class ,'sendSms']);

Route::middleware(['auth:user-api' , 'CheckUserActivation'])->group(function () {
    Route::get('ad/create-view' ,[ AdController::class ,'CreateAdView']);
    Route::get('transport-types' ,[ TransportTypeController::class ,'index']);
    Route::get('regions' ,[ RegionController::class ,'index']);
    Route::get('categories' ,[ CategoryController::class ,'index']);
    Route::get('cities' ,[ CityController::class ,'index']);
    Route::get('system-settings' ,[ SystemSettingController::class ,'index']);
    Route::get('trips-statistics' ,[ StatisticsController::class ,'tripsStatistics']);
    Route::put('trips-update-status/{trip}' ,[ TripController::class ,'UpdateStatus']);
    Route::put('trips-company-driver/{trip}' ,[ TripController::class ,'UpdateCompanyDriver']);
   //new Route
   
   Route::post('showUser/wallet' ,[ WalletController::class ,'showUser']);
   Route::post('storeUser/wallet' ,[ WalletController::class ,'storeUser']);
   Route::post('showUser/User' ,[ ApiAuthController::class ,'showUser']);
   Route::post('showUser/Not' ,[ NotificationController::class ,'showNot']);

    $controllers = require base_path('vendor/composer/autoload_classmap.php');

    $controllers = array_keys($controllers);

    $controllers = array_filter($controllers, function ($controller) {
        return (strpos($controller, 'Controllers\api') !== false) && (strpos($controller, 'Controllers\\Controller') === false)  && strlen($controller) > 0 && strpos($controller, 'Laravel') === false && strpos($controller, 'Auth') === false && (strpos($controller, 'Controller')   !== false) && (strpos($controller, 'CityController')   == false)&& (strpos($controller, 'CategoryController')   == false)&& (strpos($controller, 'RegionController')   == false)&& (strpos($controller, 'TransportTypeController')   == false)&& (strpos($controller, 'SystemSettingController')   == false)&& (strpos($controller, 'ContactUsController')   == false);
    });

    array_map(function ($controller) {

        Route::apiResource($controller::routeName(), $controller, [
            'as' => 'api'
        ]);
    }, $controllers);

});

Route::group([
    'prefix' => 'auth',
], function () {
    Route::get("/logout", [ApiAuthController::class, 'logout'])->name('logout');

    $post_auth_routes = ['updateProfile','register', 'me', 'refresh', 'forgetPassword', 'checkResetCode', 'login', 'resetPassword', 'activation' , 'updateProfileImage'];
    $put_auth_routes  = ['updatePassword'];
    foreach ($post_auth_routes as $auth_route) {
        Route::post("/" . Str::kebab($auth_route), [ApiAuthController::class, $auth_route])->name($auth_route);
    }
    foreach ($put_auth_routes as $auth_route) {
        Route::put("/" . Str::kebab($auth_route), [ApiAuthController::class, $auth_route])->name($auth_route);
    }
});


