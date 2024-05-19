<?php

namespace App\Exceptions;
use App\Helpers\Messages;
use Exception;

class PreviousProposalAcceptedAdException extends Exception
{
    //
    public function render(){

        return response()->json([
            'status'  =>   false,
            'message' => Messages::getMessage('PROPOSAL_AD_Exist_ERROR')
        ],  422);
    }

}
