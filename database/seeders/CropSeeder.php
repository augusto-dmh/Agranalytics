<?php

namespace Database\Seeders;

use App\Models\Crop;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CropSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Crop::insert([
            [
                'name' => 'Wheat',
                'scientific_name' => 'Triticum aestivum',
                'optimal_ph_min' => 6.0,
                'optimal_ph_max' => 7.5,
                'water_requirement_per_season_in_mm' => 450,
                'growth_duration_in_days' => 120
            ],
            [
                'name' => 'Rice',
                'scientific_name' => 'Oryza sativa',
                'optimal_ph_min' => 5.5,
                'optimal_ph_max' => 6.5,
                'water_requirement_per_season_in_mm' => 1200,
                'growth_duration_in_days' => 150
            ],
            [
                'name' => 'Corn',
                'scientific_name' => 'Zea mays',
                'optimal_ph_min' => 5.8,
                'optimal_ph_max' => 7.0,
                'water_requirement_per_season_in_mm' => 600,
                'growth_duration_in_days' => 90
            ],
            [
                'name' => 'Potato',
                'scientific_name' => 'Solanum tuberosum',
                'optimal_ph_min' => 5.0,
                'optimal_ph_max' => 6.5,
                'water_requirement_per_season_in_mm' => 500,
                'growth_duration_in_days' => 125
            ],
            [
                'name' => 'Tomato',
                'scientific_name' => 'Solanum lycopersicum',
                'optimal_ph_min' => 6.0,
                'optimal_ph_max' => 6.8,
                'water_requirement_per_season_in_mm' => 400,
                'growth_duration_in_days' => 85
            ],
            [
                'name' => 'Soybean',
                'scientific_name' => 'Glycine max',
                'optimal_ph_min' => 6.0,
                'optimal_ph_max' => 7.0,
                'water_requirement_per_season_in_mm' => 550,
                'growth_duration_in_days' => 100
            ],
            [
                'name' => 'Cotton',
                'scientific_name' => 'Gossypium hirsutum',
                'optimal_ph_min' => 5.8,
                'optimal_ph_max' => 7.0,
                'water_requirement_per_season_in_mm' => 700,
                'growth_duration_in_days' => 150
            ],
            [
                'name' => 'Sugarcane',
                'scientific_name' => 'Saccharum officinarum',
                'optimal_ph_min' => 6.0,
                'optimal_ph_max' => 7.5,
                'water_requirement_per_season_in_mm' => 1500,
                'growth_duration_in_days' => 270
            ],
            [
                'name' => 'Coffee',
                'scientific_name' => 'Coffea arabica',
                'optimal_ph_min' => 6.0,
                'optimal_ph_max' => 6.5,
                'water_requirement_per_season_in_mm' => 1500,
                'growth_duration_in_days' => 240
            ],
            [
                'name' => 'Cabbage',
                'scientific_name' => 'Brassica oleracea var. capitata',
                'optimal_ph_min' => 6.0,
                'optimal_ph_max' => 7.0,
                'water_requirement_per_season_in_mm' => 380,
                'growth_duration_in_days' => 70
            ],
            [
                'name' => 'Carrot',
                'scientific_name' => 'Daucus carota',
                'optimal_ph_min' => 6.0,
                'optimal_ph_max' => 7.0,
                'water_requirement_per_season_in_mm' => 350,
                'growth_duration_in_days' => 75
            ],
            [
                'name' => 'Onion',
                'scientific_name' => 'Allium cepa',
                'optimal_ph_min' => 6.0,
                'optimal_ph_max' => 7.0,
                'water_requirement_per_season_in_mm' => 450,
                'growth_duration_in_days' => 100
            ],
            [
                'name' => 'Peanut',
                'scientific_name' => 'Arachis hypogaea',
                'optimal_ph_min' => 5.9,
                'optimal_ph_max' => 7.0,
                'water_requirement_per_season_in_mm' => 500,
                'growth_duration_in_days' => 140
            ],
            [
                'name' => 'Cucumber',
                'scientific_name' => 'Cucumis sativus',
                'optimal_ph_min' => 5.5,
                'optimal_ph_max' => 7.0,
                'water_requirement_per_season_in_mm' => 400,
                'growth_duration_in_days' => 60
            ],
            [
                'name' => 'Lettuce',
                'scientific_name' => 'Lactuca sativa',
                'optimal_ph_min' => 6.0,
                'optimal_ph_max' => 7.0,
                'water_requirement_per_season_in_mm' => 300,
                'growth_duration_in_days' => 45
            ],
            [
                'name' => 'Sweet Potato',
                'scientific_name' => 'Ipomoea batatas',
                'optimal_ph_min' => 5.5,
                'optimal_ph_max' => 6.5,
                'water_requirement_per_season_in_mm' => 450,
                'growth_duration_in_days' => 150
            ],
            [
                'name' => 'Pea',
                'scientific_name' => 'Pisum sativum',
                'optimal_ph_min' => 6.0,
                'optimal_ph_max' => 7.0,
                'water_requirement_per_season_in_mm' => 350,
                'growth_duration_in_days' => 65
            ],
            [
                'name' => 'Bell Pepper',
                'scientific_name' => 'Capsicum annuum',
                'optimal_ph_min' => 5.5,
                'optimal_ph_max' => 7.0,
                'water_requirement_per_season_in_mm' => 600,
                'growth_duration_in_days' => 75
            ],
            [
                'name' => 'Broccoli',
                'scientific_name' => 'Brassica oleracea var. italica',
                'optimal_ph_min' => 6.0,
                'optimal_ph_max' => 7.0,
                'water_requirement_per_season_in_mm' => 400,
                'growth_duration_in_days' => 70
            ],
            [
                'name' => 'Cauliflower',
                'scientific_name' => 'Brassica oleracea var. botrytis',
                'optimal_ph_min' => 6.0,
                'optimal_ph_max' => 7.0,
                'water_requirement_per_season_in_mm' => 400,
                'growth_duration_in_days' => 80
            ],
            [
                'name' => 'Spinach',
                'scientific_name' => 'Spinacia oleracea',
                'optimal_ph_min' => 6.0,
                'optimal_ph_max' => 7.0,
                'water_requirement_per_season_in_mm' => 300,
                'growth_duration_in_days' => 45
            ],
            [
                'name' => 'Garlic',
                'scientific_name' => 'Allium sativum',
                'optimal_ph_min' => 6.0,
                'optimal_ph_max' => 7.0,
                'water_requirement_per_season_in_mm' => 400,
                'growth_duration_in_days' => 240
            ],
            [
                'name' => 'Eggplant',
                'scientific_name' => 'Solanum melongena',
                'optimal_ph_min' => 5.5,
                'optimal_ph_max' => 6.8,
                'water_requirement_per_season_in_mm' => 500,
                'growth_duration_in_days' => 100
            ],
            [
                'name' => 'Okra',
                'scientific_name' => 'Abelmoschus esculentus',
                'optimal_ph_min' => 6.0,
                'optimal_ph_max' => 7.0,
                'water_requirement_per_season_in_mm' => 500,
                'growth_duration_in_days' => 60
            ],
            [
                'name' => 'Pineapple',
                'scientific_name' => 'Ananas comosus',
                'optimal_ph_min' => 4.5,
                'optimal_ph_max' => 6.5,
                'water_requirement_per_season_in_mm' => 1000,
                'growth_duration_in_days' => 180
            ],
            [
                'name' => 'Watermelon',
                'scientific_name' => 'Citrullus lanatus',
                'optimal_ph_min' => 6.0,
                'optimal_ph_max' => 7.0,
                'water_requirement_per_season_in_mm' => 500,
                'growth_duration_in_days' => 80
            ],
            [
                'name' => 'Strawberry',
                'scientific_name' => 'Fragaria × ananassa',
                'optimal_ph_min' => 5.5,
                'optimal_ph_max' => 6.8,
                'water_requirement_per_season_in_mm' => 600,
                'growth_duration_in_days' => 90
            ],
            [
                'name' => 'Mango',
                'scientific_name' => 'Mangifera indica',
                'optimal_ph_min' => 5.5,
                'optimal_ph_max' => 7.5,
                'water_requirement_per_season_in_mm' => 850,
                'growth_duration_in_days' => 120
            ],
            [
                'name' => 'Banana',
                'scientific_name' => 'Musa acuminata',
                'optimal_ph_min' => 5.5,
                'optimal_ph_max' => 6.5,
                'water_requirement_per_season_in_mm' => 1200,
                'growth_duration_in_days' => 300
            ],
            [
                'name' => 'Papaya',
                'scientific_name' => 'Carica papaya',
                'optimal_ph_min' => 6.0,
                'optimal_ph_max' => 7.0,
                'water_requirement_per_season_in_mm' => 800,
                'growth_duration_in_days' => 180
            ],
            [
                'name' => 'Radish',
                'scientific_name' => 'Raphanus sativus',
                'optimal_ph_min' => 6.0,
                'optimal_ph_max' => 7.0,
                'water_requirement_per_season_in_mm' => 250,
                'growth_duration_in_days' => 30
            ],
            [
                'name' => 'Beetroot',
                'scientific_name' => 'Beta vulgaris',
                'optimal_ph_min' => 6.0,
                'optimal_ph_max' => 7.0,
                'water_requirement_per_season_in_mm' => 380,
                'growth_duration_in_days' => 90
            ],
            [
                'name' => 'Brussels Sprouts',
                'scientific_name' => 'Brassica oleracea var. gemmifera',
                'optimal_ph_min' => 6.0,
                'optimal_ph_max' => 7.0,
                'water_requirement_per_season_in_mm' => 450,
                'growth_duration_in_days' => 100
            ],
            [
                'name' => 'Asparagus',
                'scientific_name' => 'Asparagus officinalis',
                'optimal_ph_min' => 6.0,
                'optimal_ph_max' => 7.0,
                'water_requirement_per_season_in_mm' => 400,
                'growth_duration_in_days' => 730
            ],
            [
                'name' => 'Kale',
                'scientific_name' => 'Brassica oleracea var. sabellica',
                'optimal_ph_min' => 6.0,
                'optimal_ph_max' => 7.0,
                'water_requirement_per_season_in_mm' => 350,
                'growth_duration_in_days' => 60
            ],
            [
                'name' => 'Swiss Chard',
                'scientific_name' => 'Beta vulgaris subsp. vulgaris',
                'optimal_ph_min' => 6.0,
                'optimal_ph_max' => 7.0,
                'water_requirement_per_season_in_mm' => 300,
                'growth_duration_in_days' => 50
            ],
            [
                'name' => 'Celery',
                'scientific_name' => 'Apium graveolens',
                'optimal_ph_min' => 6.0,
                'optimal_ph_max' => 7.0,
                'water_requirement_per_season_in_mm' => 600,
                'growth_duration_in_days' => 125
            ],
            [
                'name' => 'Artichoke',
                'scientific_name' => 'Cynara cardunculus var. scolymus',
                'optimal_ph_min' => 6.5,
                'optimal_ph_max' => 7.5,
                'water_requirement_per_season_in_mm' => 450,
                'growth_duration_in_days' => 240
            ],
            [
                'name' => 'Leek',
                'scientific_name' => 'Allium ampeloprasum',
                'optimal_ph_min' => 6.0,
                'optimal_ph_max' => 7.0,
                'water_requirement_per_season_in_mm' => 400,
                'growth_duration_in_days' => 120
            ],
            [
                'name' => 'Zucchini',
                'scientific_name' => 'Cucurbita pepo',
                'optimal_ph_min' => 6.0,
                'optimal_ph_max' => 7.0,
                'water_requirement_per_season_in_mm' => 450,
                'growth_duration_in_days' => 50
            ],
            [
                'name' => 'Green Bean',
                'scientific_name' => 'Phaseolus vulgaris',
                'optimal_ph_min' => 6.0,
                'optimal_ph_max' => 7.0,
                'water_requirement_per_season_in_mm' => 400,
                'growth_duration_in_days' => 55
            ],
            [
                'name' => 'Parsnip',
                'scientific_name' => 'Pastinaca sativa',
                'optimal_ph_min' => 6.0,
                'optimal_ph_max' => 7.0,
                'water_requirement_per_season_in_mm' => 400,
                'growth_duration_in_days' => 120
            ],
            [
                'name' => 'Turnip',
                'scientific_name' => 'Brassica rapa subsp. rapa',
                'optimal_ph_min' => 6.0,
                'optimal_ph_max' => 7.0,
                'water_requirement_per_season_in_mm' => 350,
                'growth_duration_in_days' => 60
            ],
            [
                'name' => 'Rutabaga',
                'scientific_name' => 'Brassica napobrassica',
                'optimal_ph_min' => 6.0,
                'optimal_ph_max' => 7.0,
                'water_requirement_per_season_in_mm' => 380,
                'growth_duration_in_days' => 90
            ],
            [
                'name' => 'Kohlrabi',
                'scientific_name' => 'Brassica oleracea var. gongylodes',
                'optimal_ph_min' => 6.0,
                'optimal_ph_max' => 7.0,
                'water_requirement_per_season_in_mm' => 350,
                'growth_duration_in_days' => 55
            ],
            [
                'name' => 'Quinoa',
                'scientific_name' => 'Chenopodium quinoa',
                'optimal_ph_min' => 6.0,
                'optimal_ph_max' => 7.5,
                'water_requirement_per_season_in_mm' => 300,
                'growth_duration_in_days' => 120
            ],
            [
                'name' => 'Barley',
                'scientific_name' => 'Hordeum vulgare',
                'optimal_ph_min' => 6.0,
                'optimal_ph_max' => 7.0,
                'water_requirement_per_season_in_mm' => 450,
                'growth_duration_in_days' => 90
            ],
            [
                'name' => 'Oats',
                'scientific_name' => 'Avena sativa',
                'optimal_ph_min' => 6.0,
                'optimal_ph_max' => 7.0,
                'water_requirement_per_season_in_mm' => 400,
                'growth_duration_in_days' => 95
            ],
            [
                'name' => 'Rye',
                'scientific_name' => 'Secale cereale',
                'optimal_ph_min' => 5.8,
                'optimal_ph_max' => 7.0,
                'water_requirement_per_season_in_mm' => 400,
                'growth_duration_in_days' => 120
            ],
            [
                'name' => 'Millet',
                'scientific_name' => 'Pennisetum glaucum',
                'optimal_ph_min' => 5.5,
                'optimal_ph_max' => 7.0,
                'water_requirement_per_season_in_mm' => 350,
                'growth_duration_in_days' => 100
            ],
            [
                'name' => 'Sorghum',
                'scientific_name' => 'Sorghum bicolor',
                'optimal_ph_min' => 5.5,
                'optimal_ph_max' => 7.0,
                'water_requirement_per_season_in_mm' => 450,
                'growth_duration_in_days' => 120
            ],
            [
                'name' => 'Avocado',
                'scientific_name' => 'Persea americana',
                'optimal_ph_min' => 6.0,
                'optimal_ph_max' => 6.5,
                'water_requirement_per_season_in_mm' => 1000,
                'growth_duration_in_days' => 180
            ],
            [
                'name' => 'Lemon',
                'scientific_name' => 'Citrus limon',
                'optimal_ph_min' => 6.0,
                'optimal_ph_max' => 7.0,
                'water_requirement_per_season_in_mm' => 900,
                'growth_duration_in_days' => 240
            ],
            [
                'name' => 'Orange',
                'scientific_name' => 'Citrus sinensis',
                'optimal_ph_min' => 6.0,
                'optimal_ph_max' => 7.0,
                'water_requirement_per_season_in_mm' => 900,
                'growth_duration_in_days' => 240
            ],
            [
                'name' => 'Lime',
                'scientific_name' => 'Citrus aurantifolia',
                'optimal_ph_min' => 6.0,
                'optimal_ph_max' => 7.0,
                'water_requirement_per_season_in_mm' => 800,
                'growth_duration_in_days' => 240
            ],
            [
                'name' => 'Grapefruit',
                'scientific_name' => 'Citrus paradisi',
                'optimal_ph_min' => 6.0,
                'optimal_ph_max' => 7.0,
                'water_requirement_per_season_in_mm' => 900,
                'growth_duration_in_days' => 240
            ],
            [
                'name' => 'Fig',
                'scientific_name' => 'Ficus carica',
                'optimal_ph_min' => 6.0,
                'optimal_ph_max' => 7.0,
                'water_requirement_per_season_in_mm' => 600,
                'growth_duration_in_days' => 120
            ],
            [
                'name' => 'Pomegranate',
                'scientific_name' => 'Punica granatum',
                'optimal_ph_min' => 5.5,
                'optimal_ph_max' => 7.0,
                'water_requirement_per_season_in_mm' => 500,
                'growth_duration_in_days' => 180
            ],
            [
                'name' => 'Guava',
                'scientific_name' => 'Psidium guajava',
                'optimal_ph_min' => 5.5,
                'optimal_ph_max' => 7.0,
                'water_requirement_per_season_in_mm' => 800,
                'growth_duration_in_days' => 180
            ],
            [
                'name' => 'Passion Fruit',
                'scientific_name' => 'Passiflora edulis',
                'optimal_ph_min' => 6.0,
                'optimal_ph_max' => 7.0,
                'water_requirement_per_season_in_mm' => 800,
                'growth_duration_in_days' => 180
            ],
            [
                'name' => 'Dragon Fruit',
                'scientific_name' => 'Hylocereus undatus',
                'optimal_ph_min' => 6.0,
                'optimal_ph_max' => 7.0,
                'water_requirement_per_season_in_mm' => 600,
                'growth_duration_in_days' => 150
            ],
            [
                'name' => 'Lychee',
                'scientific_name' => 'Litchi chinensis',
                'optimal_ph_min' => 6.0,
                'optimal_ph_max' => 7.0,
                'water_requirement_per_season_in_mm' => 1200,
                'growth_duration_in_days' => 150
            ],
            [
                'name' => 'Longan',
                'scientific_name' => 'Dimocarpus longan',
                'optimal_ph_min' => 6.0,
                'optimal_ph_max' => 7.0,
                'water_requirement_per_season_in_mm' => 1000,
                'growth_duration_in_days' => 150
            ],
            [
                'name' => 'Durian',
                'scientific_name' => 'Durio zibethinus',
                'optimal_ph_min' => 6.0,
                'optimal_ph_max' => 7.0,
                'water_requirement_per_season_in_mm' => 1500,
                'growth_duration_in_days' => 120
            ],
            [
                'name' => 'Rambutan',
                'scientific_name' => 'Nephelium lappaceum',
                'optimal_ph_min' => 5.5,
                'optimal_ph_max' => 6.5,
                'water_requirement_per_season_in_mm' => 2000,
                'growth_duration_in_days' => 120
            ],
            [
                'name' => 'Mangosteen',
                'scientific_name' => 'Garcinia mangostana',
                'optimal_ph_min' => 5.5,
                'optimal_ph_max' => 7.0,
                'water_requirement_per_season_in_mm' => 1500,
                'growth_duration_in_days' => 150
            ],
            [
                'name' => 'Jackfruit',
                'scientific_name' => 'Artocarpus heterophyllus',
                'optimal_ph_min' => 6.0,
                'optimal_ph_max' => 7.5,
                'water_requirement_per_season_in_mm' => 1500,
                'growth_duration_in_days' => 120
            ],
            [
                'name' => 'Soursop',
                'scientific_name' => 'Annona muricata',
                'optimal_ph_min' => 5.5,
                'optimal_ph_max' => 6.5,
                'water_requirement_per_season_in_mm' => 1000,
                'growth_duration_in_days' => 180
            ],
            [
                'name' => 'Star Fruit',
                'scientific_name' => 'Averrhoa carambola',
                'optimal_ph_min' => 5.5,
                'optimal_ph_max' => 6.5,
                'water_requirement_per_season_in_mm' => 1800,
                'growth_duration_in_days' => 150
            ],
            [
                'name' => 'Custard Apple',
                'scientific_name' => 'Annona reticulata',
                'optimal_ph_min' => 6.5,
                'optimal_ph_max' => 7.5,
                'water_requirement_per_season_in_mm' => 800,
                'growth_duration_in_days' => 150
            ],
            [
                'name' => 'Persimmon',
                'scientific_name' => 'Diospyros kaki',
                'optimal_ph_min' => 6.0,
                'optimal_ph_max' => 7.0,
                'water_requirement_per_season_in_mm' => 800,
                'growth_duration_in_days' => 180
            ],
            [
                'name' => 'Kiwi',
                'scientific_name' => 'Actinidia deliciosa',
                'optimal_ph_min' => 5.5,
                'optimal_ph_max' => 7.0,
                'water_requirement_per_season_in_mm' => 800,
                'growth_duration_in_days' => 240
            ],
            [
                'name' => 'Blackberry',
                'scientific_name' => 'Rubus fruticosus',
                'optimal_ph_min' => 6.0,
                'optimal_ph_max' => 7.0,
                'water_requirement_per_season_in_mm' => 700,
                'growth_duration_in_days' => 90
            ],
            [
                'name' => 'Raspberry',
                'scientific_name' => 'Rubus idaeus',
                'optimal_ph_min' => 6.0,
                'optimal_ph_max' => 6.8,
                'water_requirement_per_season_in_mm' => 800,
                'growth_duration_in_days' => 90
            ],
            [
                'name' => 'Blueberry',
                'scientific_name' => 'Vaccinium corymbosum',
                'optimal_ph_min' => 4.5,
                'optimal_ph_max' => 5.5,
                'water_requirement_per_season_in_mm' => 600,
                'growth_duration_in_days' => 90
            ],
            [
                'name' => 'Cranberry',
                'scientific_name' => 'Vaccinium macrocarpon',
                'optimal_ph_min' => 4.0,
                'optimal_ph_max' => 5.5,
                'water_requirement_per_season_in_mm' => 500,
                'growth_duration_in_days' => 120
            ],
            [
                'name' => 'Grape',
                'scientific_name' => 'Vitis vinifera',
                'optimal_ph_min' => 6.0,
                'optimal_ph_max' => 7.0,
                'water_requirement_per_season_in_mm' => 650,
                'growth_duration_in_days' => 150
            ],
            [
                'name' => 'Olive',
                'scientific_name' => 'Olea europaea',
                'optimal_ph_min' => 6.0,
                'optimal_ph_max' => 8.0,
                'water_requirement_per_season_in_mm' => 400,
                'growth_duration_in_days' => 180
            ],
            [
                'name' => 'Peach',
                'scientific_name' => 'Prunus persica',
                'optimal_ph_min' => 6.0,
                'optimal_ph_max' => 7.0,
                'water_requirement_per_season_in_mm' => 750,
                'growth_duration_in_days' => 150
            ],
            [
                'name' => 'Plum',
                'scientific_name' => 'Prunus domestica',
                'optimal_ph_min' => 6.0,
                'optimal_ph_max' => 7.0,
                'water_requirement_per_season_in_mm' => 700,
                'growth_duration_in_days' => 150
            ],
            [
                'name' => 'Cherry',
                'scientific_name' => 'Prunus avium',
                'optimal_ph_min' => 6.0,
                'optimal_ph_max' => 7.0,
                'water_requirement_per_season_in_mm' => 800,
                'growth_duration_in_days' => 120
            ],
            [
                'name' => 'Apricot',
                'scientific_name' => 'Prunus armeniaca',
                'optimal_ph_min' => 6.0,
                'optimal_ph_max' => 7.0,
                'water_requirement_per_season_in_mm' => 750,
                'growth_duration_in_days' => 120
            ],
            [
                'name' => 'Almond',
                'scientific_name' => 'Prunus dulcis',
                'optimal_ph_min' => 6.0,
                'optimal_ph_max' => 7.0,
                'water_requirement_per_season_in_mm' => 800,
                'growth_duration_in_days' => 240
            ],
            [
                'name' => 'Walnut',
                'scientific_name' => 'Juglans regia',
                'optimal_ph_min' => 6.0,
                'optimal_ph_max' => 7.0,
                'water_requirement_per_season_in_mm' => 700,
                'growth_duration_in_days' => 240
            ]
        ]);
    }
}
