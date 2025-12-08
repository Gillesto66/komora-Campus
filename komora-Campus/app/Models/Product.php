<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'type', 'title', 'matiere_id', 'description', 'price_cfa', 'price_euro',
        'period', 'is_corrected', 'file_path', 'preview_path', 'diploma','pages_count',
        'file_size_kb',
    ];

    // Optionnel : affichage propre
    protected $appends = ['file_size_formatted'];

    // Relations
    public function matiere()
    {
        return $this->belongsTo(Matiere::class)->withDefault(); // ← clé magique
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'permissions');
    }

    public function getFileSizeFormattedAttribute()
    {
        if (!$this->file_size_kb) return '—';
        return $this->file_size_kb < 1024
            ? $this->file_size_kb . ' Ko'
            : round($this->file_size_kb / 1024, 1) . ' Mo';
    }

    public function getNiveauAttribute()
    {
        return $this->matiere?->niveau;
    }

    public function getFiliereAttribute()
    {
        return $this->matiere?->niveau?->filiere;
    }

    public function getNiveauNameAttribute()
    {
        return $this->niveau?->name ?? 'Niveau inconnu';
    }

    public function getFiliereNameAttribute()
    {
        return $this->filiere?->name ?? 'Filière inconnue';
    }

    
}