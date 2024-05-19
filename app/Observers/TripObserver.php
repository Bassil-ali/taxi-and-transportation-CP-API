<?php

namespace App\Observers;

use App\Exceptions\ErrorMessageException;
use App\Models\FinancialMovement;
use App\Models\SystemSetting;
use App\Models\Trip;
use App\Models\Wallet;
use Illuminate\Support\Facades\Auth;

class TripObserver
{
    /**
     * Handle the Trip "creating" event.
     *
     * @param  \App\Models\Trip  $trip
     * @return void
     */
    public function creating(Trip $trip)
    {
        //calculate commission and ad dues to trip

        $commission = SystemSetting::find('commission')->value;
        $trip->dues    =  $trip->price - ($trip->price * ($commission / 100));
    }
    /**
     * Handle the Trip "created" event.
     *
     * @param  \App\Models\Trip  $trip
     * @return void
     */
    public function created(Trip $trip)
    {
        //
    }

    /**
     * Handle the Trip "updating" event.
     *
     * @param  \App\Models\Trip  $trip
     * @return void
     */
    public function updating(Trip $trip)
    {
        //
        if ($trip->getOriginal('status') == Trip::STATUS['done']) {
            throw new ErrorMessageException('TRIP_DONE_ERROR');
        }

        if (Auth::guard('user-api')->user() && $trip->getOriginal('status') != $trip->status ) {

            if ($trip->status == 0 && ($trip->customer_id != auth('user-api')->user()->id)) {
                throw new ErrorMessageException('UNAUTHORISED');
            } elseif ($trip->status == 1) {
                throw new ErrorMessageException('UNAUTHORISED');
            } elseif ($trip->status == 2 && ($trip->driver_id != auth('user-api')->user()->id || $trip->getOriginal('status') != Trip::STATUS['scheduled'])) {
                throw new ErrorMessageException('UNAUTHORISED');
            } elseif ($trip->status == 3 && ($trip->driver_id != auth('user-api')->user()->id || $trip->getOriginal('status') != Trip::STATUS['scheduled'])) {
                throw new ErrorMessageException('UNAUTHORISED');
            } elseif ($trip->status == 4 && ($trip->driver_id != auth('user-api')->user()->id || $trip->getOriginal('status') != Trip::STATUS['received'])) {
                throw new ErrorMessageException('UNAUTHORISED');
            }
        }
        $commission = SystemSetting::find('commission')->value;
        $trip->dues    =  $trip->price - ($trip->price * ($commission / 100));
    }
    /**
     * Handle the Trip "updated" event.
     *
     * @param  \App\Models\Trip  $trip
     * @return void
     */
    public function updated(Trip $trip)
    {
        //
        //Create movement to pay the dues of trip to the driver when it finish
            $system_commission_walelt =  Wallet::where('type' , Wallet::TYPES['system_commission'])->first();
        if ($trip->status == Trip::STATUS['done']) {

            FinancialMovement::create([
                'amount' => $trip->dues,
                'impact' =>  '+',
                'type' => FinancialMovement::TYPES['trip_dues'],
                'description' => 'trip dues',
                'wallet_id' => $trip->company ? $trip->company->wallet->id : $trip->driver->wallet->id,
                'trip_id' =>   $trip->id
            ]);

            FinancialMovement::create([
                'amount' => $trip->price -  $trip->dues ,
                'impact' =>  '-',
                'type' => FinancialMovement::TYPES['system_commission'],
                'description' => 'system commission ',
                'wallet_id' => $system_commission_walelt->id,
                'ad_id' =>   $trip->ad_id,
                'trip_id' =>   $trip->id
            ]);
        }
    }

    /**
     * Handle the Trip "deleted" event.
     *
     * @param  \App\Models\Trip  $trip
     * @return void
     */
    public function deleted(Trip $trip)
    {
        //
    }

    /**
     * Handle the Trip "restored" event.
     *
     * @param  \App\Models\Trip  $trip
     * @return void
     */
    public function restored(Trip $trip)
    {
        //
    }

    /**
     * Handle the Trip "force deleted" event.
     *
     * @param  \App\Models\Trip  $trip
     * @return void
     */
    public function forceDeleted(Trip $trip)
    {
        //
    }
}
