<?php

namespace App\Domain\Catalog\Models;

use App\Domain\Catalog\Enums\ProductStatus;
use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 *
 * @property int $category_id
 * @property string $key
 * @property string $title
 * @property string $slug
 * @property string $short_description
 * @property string $thumb_image
 * @property string $description
 * @property float $price
 * @property float $retail_price
 * @property int $quantity
 * @property bool $is_active
 * @property ProductStatus $status
 *
 */
class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * @var string[]
     */
    protected $fillable = [
        'category_id',
        'key',
        'title',
        'slug',
        'short_description',
        'thumb_image',
        'description',
        'price',
        'retail_price',
        'quantity',
        'is_active',
        'status',
    ];
    /**
     * The attributes that should be cast to native types.
     * @var string[]
     */
    protected $casts = [
        'is_active' => 'boolean',
        'status' => ProductStatus::class,
    ];

    /**
     * Create a new factory instance for the model.
     * @return ProductFactory
     */
    protected static function newFactory(): ProductFactory
    {
        return ProductFactory::new();
    }
}
