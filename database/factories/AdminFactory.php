<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AdminFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name'              => fake()->name(),
            'email'             => fake()->unique()->safeEmail(),
            'phone'             => random_int(1000000000,9999999999),
            'email_verified_at' => now(),
            'status'            => fake()->boolean(),
            'password'          => 'password', // password
            'remember_token'    => str()->random(10)
        ];

    }//end of run

    
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);

    }//end of unverified

}//end of class