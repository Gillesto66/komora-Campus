<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{
    protected $fillable = [
        'name', 'filiere_id',
    ];

    // Relations
    public function filiere()
    {
        return $this->belongsTo(Filiere::class);
    }

    public function matieres()
    {
        return $this->hasMany(Matiere::class);
    }
}