<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Bidding extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'bid_amount',
    ];

    /**
     * Get the user that owns the bidding.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the product that the bidding is for.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}