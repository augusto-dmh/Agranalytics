<?php

namespace App\Models;

use App\Models\Farm;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IrrigationMethod extends Model
{
    use HasFactory;

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
