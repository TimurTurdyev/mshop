<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Group;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'brand_id' => Brand::inRandomOrder()->first()?->id,
            'group_id' => Group::inRandomOrder()->first()?->id,
            'slug' => $this->faker->slug,
            'name' => $this->faker->words(4, true),
            'sku' => $this->faker->words(2, true),
            'images' => null,
            'height' => $this->faker->numberBetween(100, 1000),
            'depth' => $this->faker->numberBetween(100, 1000),
            'width' => $this->faker->numberBetween(100, 1000),
            'weight' => $this->faker->numberBetween(1000, 100000),
            'viewed' => $this->faker->numberBetween(0, 100000),
            'status' => $this->faker->boolean,
        ];
    }
}
