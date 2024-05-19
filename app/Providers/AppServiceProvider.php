<?php

namespace App\Providers;

use App\Models\Ad;
use App\Models\Admin;
use App\Models\FinancialMovement;
use App\Models\Proposal;
use App\Models\ProposalAcceptedAd;
use App\Models\Trip;
use App\Models\User;
use App\Observers\AdminObserver;
use App\Observers\AdObserver;
use App\Observers\FinancialMovementObserver;
use App\Observers\ProposalAcceptedAdObserver;
use App\Observers\ProposalObserver;
use App\Observers\TripObserver;
use App\Observers\UserObserver;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Admin::observe(AdminObserver::class);
        User::observe(UserObserver::class);
        Ad::observe(AdObserver::class);
        Proposal::observe(ProposalObserver::class);
        ProposalAcceptedAd::observe(ProposalAcceptedAdObserver::class);
        Trip::observe(TripObserver::class);
        FinancialMovement::observe(FinancialMovementObserver::class);
        Paginator::useBootstrap();

    }//end of boot

}//end of controller