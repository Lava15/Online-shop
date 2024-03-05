<?php

namespace Modules\Catalog\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Product\Models\Product;

class Variant extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'inventory_quantity',
        'color',
        'type',
        'brand',
        'price',
        'retail_price',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
