<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\City;

class RegionFactory extends Factory
{
    public function definition()
    {
        return [
            'name'    => ['ar' => fake()->city(), 'en' => fake()->city()],
            'name_ar' => fake()->city(),
            'name_en' => fake()->city(),
            'status'  => fake()->boolean(),
            'city_id' => City::factory(),
        ];

    }//end of fun

}//end of class