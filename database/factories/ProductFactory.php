<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->words(2, true),
            'sku' => strtoupper(fake()->bothify('??###')),
            'price' => fake()->randomFloat(2, 100, 1000),
            'description' => fake()->sentence(),
            'stock' => fake()->numberBetween(0, 20),
            'image_path' => null,
        ];
    }
}
