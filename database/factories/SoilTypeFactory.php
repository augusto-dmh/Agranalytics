<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SoilType>
 */
class SoilTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text(),
            'ph_min' => $this->faker->randomFloat(1, 3, 6.5),
            'ph_max' => $this->faker->randomFloat(1, 6.6, 10),
            'organic_matter_percentage' => $this->faker->randomFloat(1, 1.0, 10.0),
        ];
    }
}
