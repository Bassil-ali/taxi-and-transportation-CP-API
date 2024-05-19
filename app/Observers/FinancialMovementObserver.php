<?php

namespace App\Observers;

use App\Exceptions\ErrorMessageException;
use App\Models\FinancialMovement;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class FinancialMovementObserver
{



    public function creating(FinancialMovement $financialMovement)
    {
        $wallet =  Wallet::find($financialMovement->wallet_id);


        if($financialMovement->type == FinancialMovement::TYPES['withdraw']  &&   $wallet->balance < $financialMovement->amount){
            throw new ErrorMessageException('BALANCE_NOT_ENOUGH');
        }
        $financialMovement->transaction_number = Carbon::now()->format('YmdH') . uniqid() . $financialMovement->type;
    }
    /**
     * Handle the FinancialMovement "created" event.
     *
     * @param  \App\Models\FinancialMovement  $financialMovement
     * @return void
     */
    public function created(FinancialMovement $financialMovement)
    {
        //
        // Update user and system wallet when the movement created

        $system_wallet =  Wallet::where('type',  Wallet::TYPES['system'])->first();
        $system_commission_walelt =  Wallet::where('type' , Wallet::TYPES['system_commission'])->first();
        $wallet =  Wallet::find($financialMovement->wallet_id);

        if ($financialMovement->type == FinancialMovement::TYPES['pay_to_ad']) {
            // from customer to  system
            $wallet->update(['balance' => $wallet->balance - $financialMovement->amount]);

            $system_wallet->update(['balance' => $system_wallet->balance + $financialMovement->amount]);


        } elseif ($financialMovement->type == FinancialMovement::TYPES['trip_dues']) {

            // from  system  to the driver
            $wallet->update(['balance' => $wallet->balance + $financialMovement->amount]);
            $system_wallet->update(['balance' => $system_wallet->balance - $financialMovement->amount]);

        } elseif ($financialMovement->type == FinancialMovement::TYPES['deposit']) {

            // from  system  to the driver
            $wallet->update(['balance' => $wallet->balance + $financialMovement->amount]);

        } elseif ($financialMovement->type == FinancialMovement::TYPES['withdraw']) {

            // from  system  to the driver
            $wallet->update(['balance' => $wallet->balance - $financialMovement->amount]);

        }elseif ($financialMovement->type == FinancialMovement::TYPES['system_commission']) {

            // from  system  to the driver
            $wallet->update(['balance' => $system_commission_walelt->balance + $financialMovement->amount]);

        };
    }

    /**
     * Handle the FinancialMovement "updated" event.
     *
     * @param  \App\Models\FinancialMovement  $financialMovement
     * @return void
     */
    public function updated(FinancialMovement $financialMovement)
    {
        //
    }

    /**
     * Handle the FinancialMovement "deleted" event.
     *
     * @param  \App\Models\FinancialMovement  $financialMovement
     * @return void
     */
    public function deleted(FinancialMovement $financialMovement)
    {
        //
    }

    /**
     * Handle the FinancialMovement "restored" event.
     *
     * @param  \App\Models\FinancialMovement  $financialMovement
     * @return void
     */
    public function restored(FinancialMovement $financialMovement)
    {
        //
    }

    /**
     * Handle the FinancialMovement "force deleted" event.
     *
     * @param  \App\Models\FinancialMovement  $financialMovement
     * @return void
     */
    public function forceDeleted(FinancialMovement $financialMovement)
    {
        //
    }
}
