<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IrrigationMethod extends Model
{
    protected $fillable = [
        'name',
        'description',
        'efficiency',
    ];
}
