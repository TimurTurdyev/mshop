<?php

namespace Database\Factories;

use App\Models\Option;
use App\Models\OptionValue;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $option = Option::inRandomOrder()->first();
        $optionValue = $option->optionValues()->inRandomOrder()->first();
        return [
            'option_id' => $option->id,
            'option_value_id' => $optionValue?->id,
        ];
    }
}
