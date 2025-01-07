<?php

namespace App\Models;

use App\Models\Farm;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class IrrigationMethod extends Model
{
    protected $fillable = [
        'name',
        'description',
        'efficiency',
    ];

    public function farms(): HasMany
    {
        return $this->hasMany(Farm::class);
    }
}
