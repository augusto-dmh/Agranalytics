<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\IrrigationMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class IrrigationMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        IrrigationMethod::factory()->count(10)->create();
    }
}
