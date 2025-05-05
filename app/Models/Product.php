<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'starting_bid',
        'start_price',
        'bid_expiry',
        'category_id',
        'image'
    ];

    // A product belongs to one category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
