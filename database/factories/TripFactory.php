<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\City;
use App\Models\Region;
use App\Models\User;
use App\Models\Ad;

class TripFactory extends Factory
{
    public function definition()
    {
        return [
            // 'ad_id'          => Ad::factory(),
            'customer_id'    => User::factory(),
            'company_id'     => User::factory(),
            'driver_id'      => User::factory(),
            'price'          => fake()->numberBetween($min = 1500, $max = 6000),
            'dues'           => fake()->numberBetween($min = 1500, $max = 6000),
            'date'           => now(),
            'go_time'        => date('H:i:s'),
            'from_city_id'   => City::factory(),
            'from_region_id' => Region::factory(),
            'from_lat'       => fake()->latitude(),
            'from_long'      => fake()->longitude(),
            'to_city_id'     => City::factory(),
            'to_region_id'   => Region::factory(),
            'to_lat'         => fake()->latitude(),
            'to_long'        => fake()->longitude(),
            'status'         => fake()->boolean(),
        ];

    }//end of fun

}//end of class