<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = 'test/create';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return test/create
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web', 'auth:admin')
                ->prefix('dashboard/admin/app')
                ->name('dashboard.admin.app.')
                ->group(base_path('routes/dashboard/admin/app.php'));

            Route::middleware('web', 'auth:admin')
                ->prefix('dashboard/admin')->name('dashboard.admin.')
                ->group(base_path('routes/dashboard/admin/web.php'));

            Route::middleware('web', 'auth:admin')
                ->prefix('dashboard/admin')->name('dashboard.admin.')
                ->group(base_path('routes/dashboard/admin/auth.php'));

            Route::middleware('web', 'auth:admin')
                ->prefix('dashboard/admin/management')
                ->name('dashboard.admin.management.')
                ->group(base_path('routes/dashboard/admin/management.php'));

            Route::middleware('web', 'auth:admin')
                ->prefix('dashboard/admin/setting')
                ->name('dashboard.admin.setting.')
                ->group(base_path('routes/dashboard/admin/setting.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
