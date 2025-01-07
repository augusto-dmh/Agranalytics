<?php

namespace App\Models;

use App\Models\Farmer;
use App\Models\SoilType;
use App\Models\IrrigationMethod;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Farm extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'size_in_ha',
        'farmer_id',
        'soil_type_id',
        'irrigation_method_id',
    ];

    public function farmer(): BelongsTo
    {
        return $this->belongsTo(Farmer::class);
    }

    public function soilType(): BelongsTo
    {
        return $this->belongsTo(SoilType::class);
    }

    public function irrigationMethod(): BelongsTo
    {
        return $this->belongsTo(IrrigationMethod::class);
    }

    public function crops(): BelongsToMany
    {
        return $this->belongsToMany(Crop::class);
    }
}
