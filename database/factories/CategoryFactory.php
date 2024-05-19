<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Admin;

class CategoryFactory extends Factory
{
    public function definition()
    {
        return [
            'name'    => ['ar' => fake()->city(), 'en' => fake()->city()],
            'slug'    => str()->slug(fake()->city(), '-'),
            'name_ar' => fake()->city(),
            'name_en' => fake()->city(),
            'status'  => fake()->boolean(),
            'admin_id'=> Admin::factory(),
        ];

    }//end of fun

}//end of class