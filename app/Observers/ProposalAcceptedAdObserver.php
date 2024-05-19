<?php

namespace App\Observers;

use App\Exceptions\ErrorMessageException;
use App\Helpers\Messages;
use App\Exceptions\PreviousProposalAcceptedAdException;
use App\Models\CustomerMovement;
use App\Models\FinancialMovement;
use App\Models\ProposalAcceptedAd;
use App\Services\TripScheduling;
use Illuminate\Support\Facades\DB;

class ProposalAcceptedAdObserver
{
    private $trip_scheduling ;

    public function __construct(TripScheduling $trip_scheduling )
    {
        $this->trip_scheduling = $trip_scheduling;;
    }

    /**
     * Handle the ProposalAcceptedAd "created" event.
     *
     * @param  \App\Models\ProposalAcceptedAd  $proposalAcceptedAd
     * @return void
     */
    public function creating(ProposalAcceptedAd $proposalAcceptedAd)
    {
        //
            //check if this ad has proposal accepted previously
           $already_registered = ProposalAcceptedAd::where('proposal_id' ,$proposalAcceptedAd->proposal_id)->orWhere('ad_id' ,$proposalAcceptedAd->ad_id)->first();
            if($already_registered){
                throw new PreviousProposalAcceptedAdException();
            }
            //check if this ad has proposal accepted previously

            $wallet = $proposalAcceptedAd->ad->user->wallet;
            if($proposalAcceptedAd->proposal->price > $wallet->balance){
                throw new ErrorMessageException('BALANCE_NOT_ENOUGH');
            }
    }
    /**
     * Handle the ProposalAcceptedAd "created" event.
     *
     * @param  \App\Models\ProposalAcceptedAd  $proposalAcceptedAd
     * @return void
     */
    public function created(ProposalAcceptedAd $proposalAcceptedAd)
    {
        //
        DB::beginTransaction();

        $this->trip_scheduling->scheduletrips($proposalAcceptedAd);

        // Create movement to pull the price of ad
        FinancialMovement::create([
            'amount' => $proposalAcceptedAd->proposal->price,
            'impact' =>  '-',
            'type' => FinancialMovement::TYPES['pay_to_ad'] ,
            'description' => 'pay to ad',
            'wallet_id' => $proposalAcceptedAd->ad->user->wallet->id,
            'ad_id' =>   $proposalAcceptedAd->ad_id
        ]);

        $proposalAcceptedAd->ad->update(['status' => 2]);
        DB::commit();
    }

    /**
     * Handle the ProposalAcceptedAd "updated" event.
     *
     * @param  \App\Models\ProposalAcceptedAd  $proposalAcceptedAd
     * @return void
     */
    public function updated(ProposalAcceptedAd $proposalAcceptedAd)
    {
        //

    }

    /**
     * Handle the ProposalAcceptedAd "deleted" event.
     *
     * @param  \App\Models\ProposalAcceptedAd  $proposalAcceptedAd
     * @return void
     */
    public function deleted(ProposalAcceptedAd $proposalAcceptedAd)
    {
        //
    }

    /**
     * Handle the ProposalAcceptedAd "restored" event.
     *
     * @param  \App\Models\ProposalAcceptedAd  $proposalAcceptedAd
     * @return void
     */
    public function restored(ProposalAcceptedAd $proposalAcceptedAd)
    {
        //
    }

    /**
     * Handle the ProposalAcceptedAd "force deleted" event.
     *
     * @param  \App\Models\ProposalAcceptedAd  $proposalAcceptedAd
     * @return void
     */
    public function forceDeleted(ProposalAcceptedAd $proposalAcceptedAd)
    {
        //
    }
}
