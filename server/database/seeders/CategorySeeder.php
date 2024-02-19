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
        ]);
        Category::query()->create([
            'name' => [
                'uz' => 'Mavsuniy mahsulotlar',
                'ru' => 'Сезонные продукты',
                'en' => 'Seasonal goods',
            ],
        ]);
        Category::query()->create([
            'name' => [
                'uz' => 'Sovg\'alar',
                'ru' => 'Подарки',
                'en' => 'Gifts',
            ],
        ]);
        Category::query()->create([
            'name' => [
                'uz' => 'Chegirmalar',
                'ru' => 'Скидки',
                'en' => 'Sales',
            ],
        ]);
        Category::query()->create([
            'name' => [
                'uz' => 'Muddatli to\'lov',
                'ru' => 'В рассрочку',
                'en' => 'For credit',
            ],
        ]);
    }

}
