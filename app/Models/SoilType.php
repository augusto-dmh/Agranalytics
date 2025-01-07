<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SoilType extends Model
{
    protected $fillable = [
        'name',
        'description',
        'ph_min',
        'ph_max',
        'organic_matter_percentage',
    ];

    public function farms(): HasMany
    {
        return $this->hasMany(Farm::class);
    }
}
