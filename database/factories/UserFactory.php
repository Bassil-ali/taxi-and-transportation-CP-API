<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\City;

class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name'              => fake()->name(),
            'email'             => fake()->unique()->safeEmail(),
            'mobile'            => random_int(1000000000,9999999999),
            'id_number'         => random_int(1000000000,9999999999),
            'email_verified_at' => now(),
            'type'              => random_int(1,4),
            'status'            => fake()->boolean(),
            'city_id'           => City::factory(),
            'password'          => 'password', // password
            'remember_token'    => str()->random(10)
        ];

    }//end of run

    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);

    }//end of unverified

}//end of class