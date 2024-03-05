<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Product\Models\Category;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition(): array
    {
        return [
            'name' => [
                'ru' => fake()->name,
                'uz' => fake()->name,
                'en' => fake()->name,
            ],
            'description' => [
                'ru' => fake()->text,
                'uz' => fake()->text,
                'en' => fake()->text,
            ],
            'slug' => fake()->slug,
            'is_active' => fake()->boolean,
            'order' => fake()->numberBetween(1, 40),
        ];
    }
}
