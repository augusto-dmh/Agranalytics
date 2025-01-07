<?php

namespace Database\Seeders;

use App\Models\Crop;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Farm;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\CropSeeder;
use Database\Seeders\FarmSeeder;
use Database\Seeders\FarmerSeeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\SoilTypeSeeder;
use Database\Seeders\IrrigationMethodSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (app()->environment(['local', 'testing'])) {
            // The order of calling the seeders is important.
            // e.g: FarmFactory searches randomly for a soil type when creating an instance (Farm *--1 SoilType)
            $this->call([
                // Independent models
                IrrigationMethodSeeder::class,
                SoilTypeSeeder::class,
                FarmerSeeder::class,
                CropSeeder::class,
                // Dependent models (need at least one of the above to exist)
                FarmSeeder::class,
                /* Optionally-associated
                Crop - Farm (M:N)
                */
            ]);

            // Crop - Farm (M:N)
            $farms = Farm::all();
            $crops = Crop::all();

            $cropFarmData = [];

            $farms->each(function (Farm $farm) use ($crops) {
                $randomCropsIds = $crops->random(rand(1, 50))->pluck('id')->toArray();
                foreach ($randomCropsIds as $randomCropId) {
                    $farmCropData[] = [
                        'crop_id' => $randomCropId,
                        'farm_id' => $farm->id,
                    ];
                }
            });

            DB::table('crop_farm')->insert($cropFarmData);
        }
    }
}
