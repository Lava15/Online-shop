<?php

namespace Database\Factories;

use App\Domain\Catalog\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
class CategoryFactory extends Factory
{
    protected $model = Category::class;
    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'description' => fake()->text,
            'slug' => fake()->slug,
            'active' => fake()->boolean
        ];
    }
}
