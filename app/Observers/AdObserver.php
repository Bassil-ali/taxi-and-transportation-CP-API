<?php

namespace App\Observers;

use App\Exceptions\ErrorMessageException;
use App\Models\Ad;
use App\Models\FinancialMovement;

class AdObserver
{
    /**
     * Handle the Ad "creating" event.
     *
     * @param  \App\Models\Ad  $ad
     * @return void
     */
    public function creating(Ad $ad)
    {
        //
        // if(!$ad->go_time) {
        //     $ad->go_time = now()->toTimeString();
        // }


        if(auth()->guard('user-api')->check()){
            $ad->user_id = auth()->user()->id;
        }
        $ad->status =1;


    }

        /**
     * Handle the Ad "updating" event.
     *
     * @param  \App\Models\Ad  $ad
     * @return void
     */
    public function updating(Ad $ad)
    {
        //

        if($ad->getOriginal('status') == 2){
            throw new ErrorMessageException('UPDATE_AD_ERROR');
        }

    }


    /**
     * Handle the Ad "created" event.
     *
     * @param  \App\Models\Ad  $ad
     * @return void
     */
    public function created(Ad $ad)
    {
        //

    }

    /**
     * Handle the Ad "updated" event.
     *
     * @param  \App\Models\Ad  $ad
     * @return void
     */
    public function updated(Ad $ad)
    {
        //


    }

    /**
     * Handle the Ad "deleted" event.
     *
     * @param  \App\Models\Ad  $ad
     * @return void
     */
    public function deleted(Ad $ad)
    {
        //
    }

    /**
     * Handle the Ad "restored" event.
     *
     * @param  \App\Models\Ad  $ad
     * @return void
     */
    public function restored(Ad $ad)
    {
        //
    }

    /**
     * Handle the Ad "force deleted" event.
     *
     * @param  \App\Models\Ad  $ad
     * @return void
     */
    public function forceDeleted(Ad $ad)
    {
        //
    }
}
