<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Catalog\Models\Category;

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
