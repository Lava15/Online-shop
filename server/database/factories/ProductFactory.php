<?php

namespace Database\Factories;

use App\Domain\Catalog\Enums\ProductStatus;
use App\Domain\Catalog\Models\Category;
use App\Domain\Catalog\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Domain\Catalog\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'category_id' => Category::factory(),
            'created_by' => 1,
            'updated_by' => 1,
            'deleted_by' => 1,
            'key' => fake()->uuid,
            'title' => fake()->name,
            'slug' => fake()->slug,
            'short_description' => fake()->text(20),
            'description' => fake()->text(50),
            'price' => fake()->numberBetween(100, 10000) * 1000,
            'retail_price' => fake()->numberBetween(100, 10000) * 970,
            'quantity' => fake()->numberBetween(1, 100),
            'status' => fake()->randomElement(ProductStatus::getValues()),
            'is_active' => fake()->boolean,
        ];
    }
}
