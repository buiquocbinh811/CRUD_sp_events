<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'store_id',
        'product_name',
        'product_description',
        'product_price',
    ];
    protected $casts = [
        'product_price' => 'decimal:2',
        'created_at' => 'datetime'
    ];

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }
    // Format price accessor
    public function getFormattedPriceAttribute()
    {
        return number_format($this->product_price, 2) . ' VND';
    }
    public function getFormattedCreatedAtAttribute()
    {
        return $this->created_at->format('d/m/Y H:i');
}
}
