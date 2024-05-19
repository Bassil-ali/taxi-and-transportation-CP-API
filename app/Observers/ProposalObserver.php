<?php

namespace App\Observers;

use App\Exceptions\ErrorMessageException;
use App\Models\Proposal;
use App\Models\SystemSetting;

class ProposalObserver
{
        /**
     * Handle the Proposal "created" event.
     *
     * @param  \App\Models\Proposal  $proposal
     * @return void
     */
    public function creating(Proposal $proposal)
    {
        //

        $auth_user_id =auth('user-api')->user()->id ;

        if($proposal->ad->status != 1 ){
             throw new ErrorMessageException('AD_PROPOSAL_FAILED');
        }
        $previous_prposal = Proposal::where('user_id'  , $auth_user_id )->where('ad_id' , $proposal->ad_id)->first() ;

        if($previous_prposal){
            throw new ErrorMessageException('HAVE_PREVIOUS_PROPOSAL');
       }

        $proposal->user_id = $auth_user_id;
        $commission = SystemSetting::find('commission')->value;
        $proposal->commission =$commission;
        $system_commession = $proposal->price - ($proposal->price * ($proposal->commission / 100));
        $proposal->dues    = $system_commession;
        $proposal->status  = 1;
    }

    /**
     * Handle the Proposal "created" event.
     *
     * @param  \App\Models\Proposal  $proposal
     * @return void
     */
    public function created(Proposal $proposal)
    {
        //
    }

    /**
     * Handle the Proposal "updated" event.
     *
     * @param  \App\Models\Proposal  $proposal
     * @return void
     */
    public function updated(Proposal $proposal)
    {
        //
    }

    /**
     * Handle the Proposal "deleted" event.
     *
     * @param  \App\Models\Proposal  $proposal
     * @return void
     */
    public function deleted(Proposal $proposal)
    {
        //
    }

    /**
     * Handle the Proposal "restored" event.
     *
     * @param  \App\Models\Proposal  $proposal
     * @return void
     */
    public function restored(Proposal $proposal)
    {
        //
    }

    /**
     * Handle the Proposal "force deleted" event.
     *
     * @param  \App\Models\Proposal  $proposal
     * @return void
     */
    public function forceDeleted(Proposal $proposal)
    {
        //
    }
}
