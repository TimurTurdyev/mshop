<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Collection>
 */
class CollectionFactory extends Factory
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
            'slug' => $this->faker->slug,
            'name' => $this->faker->words(4, true),
            'images' => $images,
            'status' => $this->faker->boolean,
        ];
    }
}
