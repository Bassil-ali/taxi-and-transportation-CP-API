<?php

namespace App\Exceptions;

use App\Helpers\Messages;
use Exception;

class ErrorMessageException extends Exception
{
    public $message ;
    public $status ;
    
    public function __construct($message = "" , $status = 400) {
        $this->message = $message;
        $this->status = $status;
    }


    //
    public function render(){

        return response()->json([
            'status'  =>   false,
            'message' =>Messages::getMessage($this->message)
        ], $this->status);
    }
}
