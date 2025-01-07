<?php

namespace Database\Factories;

use App\Models\Farmer;
use App\Models\SoilType;
use App\Models\IrrigationMethod;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Farm>
 */
class FarmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $farmers = Farmer::all();
        $soilTypes = SoilType::all();
        $irrigationMethods = IrrigationMethod::all();

        return [
            'name' => $this->faker->name,
            'address' => $this->faker->address,
            'size_in_ha' => $this->faker->randomFloat(1, 1, 1000),
            'farmer_id' => $farmers->random()->id,
            'soil_type_id' => $soilTypes->random()->id,
            'irrigation_method_id' => $irrigationMethods->random()->id,
        ];
    }
}