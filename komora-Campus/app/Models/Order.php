<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Log;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'total_amount',
        'status',
        'payment_provider',
        'transaction_id',
    ];

    protected $casts = [
        'total_amount' => 'decimal:2',
    ];

    // Relations
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    // Helper : marquer comme payée (avec log)
    public function markAsPaid(string $transactionId, string $provider = 'unknown'): void
    {
        $this->update([
            'status' => 'paid',
            'transaction_id' => $transactionId,
            'payment_provider' => $provider,
        ]);

        Log::info("Commande {$this->id} marquée comme payée", [
            'user_id' => $this->user_id,
            'transaction_id' => $transactionId,
            'provider' => $provider,
        ]);
    }
}