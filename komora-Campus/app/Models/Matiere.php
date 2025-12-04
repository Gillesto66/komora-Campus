<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    protected $fillable = [
        'name', 'niveau_id', 'semester',
    ];

    // Relations
    public function niveau()
    {
        return $this->belongsTo(Niveau::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}