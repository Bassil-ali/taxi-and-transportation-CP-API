<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FinancialMovementController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Permissions\RoleController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\SystemSettingController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/test/create', \App\Livewire\Test::class);

// Route::get('/', \App\Livewire\Test::class);
 
// Route::get('/posts', \App\Livewire\Post::class)->name('posts');
 
// Route::get('/users', \App\Livewire\User::class);

//Language rout
// Route::get('/users', [UserController::class, 'index']);

Route::get('/', function() {

    if (auth('admin')->check()) {

        return redirect()->back();
        
    } else {

        return view('dashboard.admin.auth.login');
    }

});

Route::get('/hiwhats', function () {
	
	dd(auth('admin')->login(\App\Models\Admin::first()));

    $actions = [
        'edit'  => [
            'route'       => route('dashboard.admin.management.roles.index'),
            'permissions' => 'update',
        ],
        'delete'  => [
            'route'       => route('dashboard.admin.management.roles.index'),
            'permissions' => 'delete',
        ]
    ];
    // unset($actions['delete']);
    dd($actions);

    $url = "https://hiwhats.com/API/send?mobile=966543686986&password=Hh8@hicc0roffzvs&instanceid=19856&message=52525&numbers=972598353056&json=1&type=1";
    return Redirect::to($url);
});

Route::get('/clear-cache', function () {
   Artisan::call('cache:clear');
   Artisan::call('route:clear');

   return "Cache cleared successfully test";
});


Route::get('/passport', function () {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('optimize');
    Artisan::call('migrate:refresh');
    Artisan::call('db:seed');
    Artisan::call('migrate',['--path' => 'vendor/laravel/passport/database/migrations','--force' => true]);
    shell_exec('php ../artisan passport:install');
});

Route::get('admin/login', [AuthController::class, 'showLogin'])->middleware('guest:admin')->name('login-view');
Route::post('admin/login', [AuthController::class, 'login'])->name('admin-login');
// dd($controllers);

Route::prefix('cms')->middleware('auth:admin')->group(function () {
    Route::get('admin/{admin_id}/financial_movements', [AdminController::class, 'financialMovements'])->name('admin-financialMovements');
    Route::get('user/{user_id}/financial_movements', [UserController::class, 'financialMovements'])->name('user-financialMovements');

    Route::get('/change-languge/{lang}', [DashboardController::class, 'changeLang'])->name('dashboard.languge');

    Route::get('users/toggle-status/{user}', [UserController::class, 'toggleStatus'])->name('user-toggle-status');
    Route::resource('/roles', RoleController::class);
    Route::put('role/{role}/permissions', [RolePermissionController::class , 'update'])->name('role-permission-update');

    Route::get('/', [DashboardController::class, 'systemStatistics'])->name('main.statistics.index');
    Route::get('/system/settings', [SystemSettingController::class, 'edit'])->name('system_settings.edit');
    Route::put('/system/settings', [SystemSettingController::class, 'update'])->name('system_settings.update');
    // Route::get('/financial-movement', [FinancialMovementController::class, 'index'])->name('financial_movementController.index');
    // Route::get('/transfers', [FinancialMovementController::class, 'paymentAndDeposit'])->name('financial_movementController.paymentAndDeposit');


    Route::prefix('auth')->middleware('auth:admin')->group(function () {
        Route::get('edit-profile', [AuthController::class, 'editProfile'])->name('admin.edit-profile');
        Route::put('update-profile', [AuthController::class, 'updateProfile'])->name('admin.update-profile');

        Route::get('edit-password', [AuthController::class, 'editPassword'])->name('admin.edit-password');
        Route::put('update-password', [AuthController::class, 'updatePassword'])->name('admin.update-password');
    });
    Route::get('logout', [AuthController::class, 'logout'])->name('admin-logout');

    $controllers = require base_path('vendor/composer/autoload_classmap.php');

    $controllers = array_keys($controllers);

    $controllers = array_filter($controllers, function ($controller) {
        // return (strpos($controller, 'Controllers') !== false && strpos($controller, 'api') == false) ? method_exists($controller, 'routeName') : false;
    });



    $controllers = array_filter($controllers, function ($controller) {
        return (strpos($controller, 'Controllers') !== false) && strlen($controller) > 0 && strpos($controller, 'Base') == false
            && strpos($controller, 'Auth') == false && strpos($controller, 'App')  >= 0 && strpos($controller, 'AppSetting') == false   && strpos($controller, 'SystemSettingController') == false;
    });

    array_map(function ($controller) {
        Route::Resource($controller::routeName(), $controller);
    }, $controllers);
});
