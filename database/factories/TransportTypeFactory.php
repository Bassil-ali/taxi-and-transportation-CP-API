<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Admin;

class TransportTypeFactory extends Factory
{
    public function definition()
    {
        return [
            'name'    => ['ar' => fake()->name(), 'en' => fake()->name()],
            'slug'    => str()->slug(fake()->name(), '-'),
            'name_ar' => fake()->name(),
            'name_en' => fake()->name(),
            'status'  => fake()->boolean(),
            'admin_id'=> Admin::factory(),
        ];

    }//end of fun

}//end of class