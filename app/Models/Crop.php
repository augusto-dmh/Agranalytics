<?php

namespace App\Models;

use App\Models\Farm;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Crop extends Model
{
    protected $fillable = [
        'name',
        'scientific_name',
        'optimal_ph_min',
        'optimal_ph_max',
        'water_requirement_per_season_in_mm',
        'growth_duration_in_days',
    ];

    public function farms(): BelongsToMany
    {
        return $this->belongsToMany(Farm::class);
    }
}
