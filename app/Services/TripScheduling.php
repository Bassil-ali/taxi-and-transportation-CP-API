<?php

namespace App\Services;

use App\Exceptions\ErrorMessageException;
use App\Models\Lecture;
use App\Models\Trip;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class TripScheduling
{

    function scheduletrips($proposalAcceptedAd)
    {

        //preparing data
        $ad                     = $proposalAcceptedAd->ad;
        $proposal               =  $proposalAcceptedAd->proposal;


        $user_type              = $proposal->user->type;
        $Proposal_user_id       = $proposal->user_id;
        $customer_user_id       = $ad->user_id;
        $go_time                = $ad->go_time;
        $return_time            = $ad->return_time;
        $ad_duration            = $ad->duration;
        $ad_id                  = $proposalAcceptedAd->ad_id;
        $driver_id  =    $user_type == 2 ? $Proposal_user_id : null;
        $company_id =    $user_type == 3 ? $Proposal_user_id : null;

        $total_trip_count = 1;
        $price              = $proposal->price;
        $dues               = $proposal->dues;

        if ($ad_duration != 1) {

            $week_count  = $ad_duration == 3 ? 4 : 1;
            $week_days =  json_decode($proposalAcceptedAd->ad->days);
            //   $week_days =  $proposalAcceptedAd->ad->days, true);

            $week_days_count = count($week_days);
            $total_trip_count = $week_days_count * $week_count; //6

            $days_of_trip       = $week_days;
            $start_date         = $proposalAcceptedAd->ad->start_date;



            $days = CarbonPeriod::create(Carbon::parse($start_date), Carbon::parse($start_date)->addWeek($week_count));
            $result = [];

            //calculate price and dues
            $price  = $price / $total_trip_count;
            $dues   = $dues / $total_trip_count;
            if($ad->return_time){
                // go and return -> double trips count
                $price  = $price /  2;
                $dues   = $dues / 2;
            }


            //create dates in period

            foreach ($days as $day) {
                if (in_array($day->dayOfWeek, $days_of_trip)) {
                    $result[] = $day->format('y-m-d');
                }
            }
        }



        $trips = [];


        // add data in trips array
        for ($i = 0; $i < $total_trip_count; $i++) {
            $trips[] = [

                "ad_id" => $ad_id,
                "customer_id" => $customer_user_id,
                "company_id"    => $company_id,
                "driver_id"     => $driver_id,
                "go_time"       => $go_time,
                "price"         => $price,
                "dues"          => $dues,
                "date"          =>    $ad_duration == 1 ?   $ad->start_date : $result[$i],

                "from_city_id"  => $ad->from_city_id,
                "from_region_id"=> $ad->from_region_id,
                "from_lat"      => $ad->from_lat,
                "from_long"     => $ad->from_long,

                "to_city_id"    => $ad->to_city_id,
                "to_region_id"  => $ad->to_region_id,
                "to_lat"        => $ad->to_lat,
                "to_long"       => $ad->to_long,

                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()

            ];
        }

        if($ad->return_time){
            for ($i = 0; $i < $total_trip_count; $i++) {
                $trips[] = [

                    "ad_id" => $ad_id,
                    "customer_id" => $customer_user_id,
                    "company_id"    => $company_id,
                    "driver_id"     => $driver_id,
                    "go_time"       => $ad->return_time,
                    "price"         => $price,
                    "dues"          => $dues,
                    "date"          => $ad_duration == 1 ?   $ad->start_date : $result[$i],

                    "from_city_id"  => $ad->to_city_id,
                    "from_region_id"=> $ad->to_region_id,
                    "from_lat"      => $ad->to_lat,
                    "from_long"     => $ad->to_long,

                    "to_city_id"    => $ad->from_city_id,
                    "to_region_id"  => $ad->from_region_id,
                    "to_lat"        => $ad->from_lat,
                    "to_long"       => $ad->from_long,
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now()

                ];
            }
        }
        // insert DB
        if (!Trip::where('ad_id', '=', $ad_id)->first()) {
            //     throw new ErrorMessageException('test');
            Trip::insert($trips);
        }
        // return response()->json(['message' => 'Created Successfuly' ], 200);
    }
}
