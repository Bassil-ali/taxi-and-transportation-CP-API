<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\TripResource;
use App\Models\FinancialMovement;
use App\Models\Trip;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;


class StatisticsController extends Controller
{
    //

    public function tripsStatistics (Request $request){

      $auth_user =auth()->user();
                  $wallet =     Wallet::where('user_id' , $auth_user->id)->first();

        if($auth_user->type == User::DRIVER || $auth_user->type == User::COMPANY ){
          $trips = Trip::where('company_id' ,'=' , $auth_user->id)->orwhere('driver_id' , '=', $auth_user->id)->with('ad')->get();
          $total_count =$trips->count() ;
          $price =$trips->sum('price');
          $dues =$trips->sum('dues');
          $commission =  $price -  $dues;
          $Successful_trips = $trips->where('status' , Trip::STATUS['done'])->count() ;
          $remaining_trips   = $total_count - $Successful_trips;
            $movements =     FinancialMovement::where('wallet_id' , $wallet->id)->orderBy('id', 'DESC')->get();


            return response()->json([
                'status' => true,
                'data' => [
                    'total_count' => $total_count,
                    'price' => $price,
                    'dues' => $dues,
                    'commission' => $commission,
                    'Successful_trips' => $Successful_trips,
                    'remaining_trips' => $remaining_trips,
                   'movements' => $movements,
                    'trips'           =>  TripResource::collection($trips) ,
                ]
            ]);
  
        }elseif($auth_user->type == User::CUSTOMER ){
            $trips = Trip::where('customer_id' ,'=' , $auth_user->id)->get();
            $total_count =$trips->count() ;
            $price =   $trips->sum('price');
            $movements =     FinancialMovement::where('wallet_id' , $wallet->id)->orderBy('id', 'DESC')->get();
            
               
            
            return response()->json([
                'status' => true,
                'data' => [
                    'total_count' => $total_count,
                    'price' => $wallet->balance,
                    'movements' => $movements,
                           ]
            ]);
        }

    }

}
