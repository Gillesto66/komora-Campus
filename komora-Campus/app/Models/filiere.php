<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    protected $fillable = [
        'emblem', 'name', 'description',
    ];

    // Relations
    public function niveaux()
    {
        return $this->hasMany(Niveau::class);
    }
}