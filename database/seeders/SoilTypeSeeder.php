<?php

namespace Database\Seeders;

use App\Models\SoilType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SoilTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SoilType::factory()->count(10)->create();
    }
}
