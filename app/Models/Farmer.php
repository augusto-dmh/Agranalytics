<?php

namespace App\Models;

use App\Models\Farm;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Farmer extends Model
{
    protected $fillable = [
        'full_name',
        'phone_number',
        'email',
        'password'
    ];

    public function farms(): HasMany
    {
        return $this->hasMany(Farm::class);
    }
}
