<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'total' => 0,
            'delivery_method' => fake()->randomElement(['pickup', 'post']),
            'payment_method' => fake()->randomElement(['cod', 'online']),
            'status' => fake()->randomElement(['new', 'processing', 'completed']),
        ];
    }
}
