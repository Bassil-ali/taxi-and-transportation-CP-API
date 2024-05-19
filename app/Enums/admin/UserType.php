<?php

namespace App\Enums\Admin;

enum UserType: string
{
    const CUSTOMER = 1;
    const DRIVER   = 2;
    const COMPANY  = 3;
    const EMPLOYEE = 4;

    public static function array(): array
    {
    	return [
    		1 => 'CUSTOMER',
    		2 => 'DRIVER',
    		3 => 'COMPANY',
    		4 => 'EMPLOYEE',
    	];

    }//end of fun

}//end of enum