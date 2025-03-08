<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Crop>
 */
class CropFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $optimal_ph_min = $this->faker->randomFloat(1, 5.5, 6.5);
        $optimal_ph_max = $this->faker->randomFloat(1, $optimal_ph_min, 14);

        return [
            'name' => $this->faker->name,
            'scientific_name' => $this->faker->words(2, true),
            'optimal_ph_min' => $optimal_ph_min,
            'optimal_ph_max' => $optimal_ph_max,
            'water_requirement_per_season_in_mm' => $this->faker->numberBetween(200, 1500),
            'growth_duration_in_days' => $this->faker->numberBetween(60, 180),
        ];
    }
}
