<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Price>
 */
class PriceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $images = [
            $this->faker->imageUrl(1024, 1024),
            $this->faker->imageUrl(1024, 1024),
            $this->faker->imageUrl(1024, 1024),
            $this->faker->imageUrl(1024, 1024),
        ];

        return [
            'images' => $images,
            'sku' => $this->faker->words(2, true),
            'price' => $this->faker->numberBetween(1000, 100_000),
            'special' => $this->faker->numberBetween(0, 100_000),
            'quantity' => $this->faker->numberBetween(0, 100),
            'sort_order' => $this->faker->numberBetween(0, 100_000),
            'status' => $this->faker->boolean,
        ];
    }
}
