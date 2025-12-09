<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'role', 'phone', 'is_subscribed',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // Relations
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'permissions')
                    ->withTimestamps()
                    ->withPivot('created_at')
                    ->as('purchase') // ← clé magique
                    ->withCasts(['purchase.created_at' => 'datetime:d F Y']); // ← cast direct !
    }

    public function getRedirectRoute()
    {
        return match ($this->role) {
            'admin'     => '/dashboard/admin',
            'affilier'  => '/affilier/dashboard',
            'user'      => '/dashboard',
            default     => '/dashboard',
        };
    }

    
}