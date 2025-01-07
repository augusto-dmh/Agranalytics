<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    protected $fillable = [
        'name',
        'address',
        'size_in_ha',
        'soil_type_id',
        'irrigation_method_id',
    ];
}
