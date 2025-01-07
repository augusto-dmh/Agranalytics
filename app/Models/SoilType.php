<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SoilType extends Model
{
    use HasFactory;

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
