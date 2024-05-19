<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Trip;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class DashboardController extends Controller
{
    //
    public function changeLang(Request $request, $languge)
    {

        $status = in_array($languge, ['en', 'ar']);

        $lang = $status ? $languge : 'en';

        session()->put('lang', $lang);
        App::setLocale($lang);
        return redirect()->back();
    }

    //
    public function systemStatistics(Request $request)
    {
        $customer_count = User::where('type' , User::CUSTOMER)->count();
        $driver_count = User::where('type' , User::DRIVER)->count();
        $company_count = User::where('type' , User::COMPANY)->count();
        $employee_count = User::where('type' , User::EMPLOYEE)->count();

        $ads_count = Ad::count();
        $trips_count = Trip::count();
        $completed_ads_count = Ad::where('status' , 2 )->count();
        $completed_trips_count = Trip::where('status' , Trip::STATUS['done'] )->count();

        $system_wallet_balance = Wallet::where('type' , Wallet::TYPES['system'])->first()->balance ?? null;
        $system_commission_balance = Wallet::where('type' , Wallet::TYPES['system_commission'])->first()->balance ?? null;

        $customer_wallet_balance = Wallet::where('type' , Wallet::TYPES['customer'])->sum('balance') ;
        $driver_wallet_balance = Wallet::where('type' , Wallet::TYPES['driver'])->sum('balance') ;
        $company_wallet_balance = Wallet::where('type' , Wallet::TYPES['company'])->sum('balance') ;
        $employee_wallet_balance = Wallet::where('type' , Wallet::TYPES['employee'])->sum('balance') ;


        return response()->view('dashboard_statistics' , compact(
            'customer_count' ,
             'driver_count' ,
             'company_count' ,
             'employee_count' ,
             'ads_count' ,
             'trips_count',
             'completed_ads_count',
             'completed_trips_count',
             'system_wallet_balance',
             'system_commission_balance',
             'customer_wallet_balance',
             'driver_wallet_balance',
             'company_wallet_balance',
             'employee_wallet_balance',
            ));
    }
}
