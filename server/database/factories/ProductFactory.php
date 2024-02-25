<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Catalog\Enums\ProductStatus;
use Modules\Catalog\Models\Category;
use Modules\Catalog\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Modules\Catalog\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'category_id' => fake()->numberBetween(1,5),
            'created_by' => 1,
            'updated_by' => 1,
            'deleted_by' => 1,
            'key' => fake()->uuid,
            'sku' => fake()->postcode,
            'title' => fake()->name,
            'slug' => fake()->slug,
            'description' => fake()->text(50),
            'price' => fake()->numberBetween(100, 10000) * 1000,
            'retail_price' => fake()->numberBetween(100, 10000) * 970,
            'quantity' => fake()->numberBetween(1, 100),
            'status' => fake()->randomElement(ProductStatus::getValues()),
            'is_active' => fake()->boolean,
        ];
    }
}
