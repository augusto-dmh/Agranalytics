<?php

namespace Database\Seeders;

use App\Models\Farmer;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FarmerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Farmer::factory()->count(100)->create();
    }
}
