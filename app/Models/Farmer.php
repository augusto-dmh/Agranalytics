<?php

namespace App\Models;

use App\Models\Farm;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Farmer extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'phone_number',
        'email',
        'password'
    ];

    protected function casts()
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function farms(): HasMany
    {
        return $this->hasMany(Farm::class);
    }
}
