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
        $php_min = $this->faker->randomFloat(1, 3, 6.5);
        $php_max = $this->faker->randomFloat(1, $php_min, 14);

        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text(),
            'ph_min' => $php_min,
            'ph_max' => $php_max,
            'organic_matter_percentage' => $this->faker->randomFloat(1, 1.0, 10.0),
        ];
    }
}
