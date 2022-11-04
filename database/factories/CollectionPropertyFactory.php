<?php

namespace Database\Factories;

use App\Models\OptionValue;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CollectionProperty>
 */
class CollectionPropertyFactory extends Factory
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
            'name' => $this->faker->words(2, true),
            'price' => $this->faker->numberBetween(1000, 100_000),
            'sort_order' => $this->faker->numberBetween(0, 100_000),
            'status' => $this->faker->boolean,
        ];
    }
}
