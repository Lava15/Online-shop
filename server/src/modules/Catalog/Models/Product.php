<?php

namespace Modules\Catalog\Models;

use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Catalog\Enums\ProductStatus;
use Modules\Shared\Traits\HasKey;

/**
 * Class Product
 *
 * @property int $category_id
 * @property string $key
 * @property string $title
 * @property string $slug
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
    use HasKey;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     * @var string[]
     */
    protected $fillable = [
        'category_id',
        'key',
        'title',
        'sku',
        'slug',
        'thumb_image',
        'description',
        'price',
        'retail_price',
        'sale_price',
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

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function variants(): HasMany
    {
        return $this->hasMany(Variant::class);
    }

    /**
     * Create a new factory instance for the model.
     * @return ProductFactory
     */
    protected static function newFactory(): ProductFactory
    {
        return ProductFactory::new();
    }
}