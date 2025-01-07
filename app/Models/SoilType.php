<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SoilType extends Model
{
    protected $fillable = [
        'name',
        'description',
        'ph_min',
        'ph_max',
        'organic_matter_percentage',
    ];
}
