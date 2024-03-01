<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Catalog\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        //        Category::factory()->count(10)->create();
        Category::query()->create([
            'name' => [
                'uz' => 'Hobby uchun',
                'ru' => 'Для хобби',
                'en' => 'For hobby',
            ],
            'description' => [
                'uz' => 'Hobby uchun mahsulotlar',
                'ru' => 'Товары для хобби',
                'en' => 'Description of category',
            ],
            'slug' => fake()->slug,
            'is_active' => true,
        ]);
        Category::query()->create([
            'name' => [
                'uz' => 'Mavsuniy mahsulotlar',
                'ru' => 'Сезонные продукты',
                'en' => 'Seasonal goods',
            ],
            'description' => [
                'uz' => 'Hobby uchun mahsulotlar',
                'ru' => 'Товары для хобби',
                'en' => 'Description of category',
            ],
            'slug' => fake()->slug,
            'is_active' => true,
        ]);
        Category::query()->create([
            'name' => [
                'uz' => 'Sovg\'alar',
                'ru' => 'Подарки',
                'en' => 'Gifts',
            ],
            'description' => [
                'uz' => 'Hobby uchun mahsulotlar',
                'ru' => 'Товары для хобби',
                'en' => 'Description of category',
            ],
            'slug' => fake()->slug,
            'is_active' => true,
        ]);
        Category::query()->create([
            'name' => [
                'uz' => 'Chegirmalar',
                'ru' => 'Скидки',
                'en' => 'Sales',
            ],
            'description' => [
                'uz' => 'Hobby uchun mahsulotlar',
                'ru' => 'Товары для хобби',
                'en' => 'Description of category',
            ],
            'slug' => fake()->slug,
            'is_active' => true,
        ]);
        Category::query()->create([
            'name' => [
                'uz' => 'Muddatli to\'lov',
                'ru' => 'В рассрочку',
                'en' => 'For credit',
            ],
            'description' => [
                'uz' => 'Hobby uchun mahsulotlar',
                'ru' => 'Товары для хобби',
                'en' => 'Description of category',
            ],
            'slug' => fake()->slug,
            'is_active' => true,
        ]);
    }
}
