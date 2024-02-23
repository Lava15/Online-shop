<?php

use Modules\Catalog\Models\Category;
use Symfony\Component\HttpFoundation\Response;
use function Pest\Laravel\assertSoftDeleted;
use function Pest\Laravel\deleteJson;
use function Pest\Laravel\getJson;
use function Pest\Laravel\postJson;

it('get all categories', function () {

    $this->getJson('/api/v1/categories')
        ->assertStatus(200);
})->group('v1-categories');

it('creates a category', function () {
    $data = [
        'name' => [
            'uz' => 'Yangi',
            'ru' => 'Новое',
            'en' => 'New'
        ],
        'description' => [
            'uz' => 'Yangi mahsulotlar',
            'ru' => 'Новые товры',
            'en' => 'New products'
        ],
        'slug' => 'new-product-slug',
        'is_active' => true,
        'order' => 1
    ];

    postJson('/api/v1/categories', $data)
        ->assertStatus(Response::HTTP_CREATED);
//    assertDatabaseHas(table: 'categories', data: $data);
})->group('v1-categories');

it('updates a category', function () {
    $category = Category::factory()->create();

    $updatingData = [
        'name' => [
            'uz' => 'Yangi 2',
            'ru' => 'Новое 2',
            'en' => 'New 2'
        ],
        'description' => [
            'uz' => 'Yangi mahsulotlar 2',
            'ru' => 'Новые товры 2',
            'en' => 'New products 2'
        ],
        'slug' => 'new-product-slug 2',
        'is_active' => true,
        'order' => 2
    ];


    $response = $this->putJson("/api/v1/categories/{$category->id}", $updatingData);
    $response->assertStatus(Response::HTTP_CREATED);
//    $this->assertDatabaseHas('categories', $updatingData);
})->group('v1-categories');

it('shows a category', function () {
    $category = Category::factory()->create();

    getJson("/api/v1/categories/{$category->id}")
        ->assertStatus(200);
//        ->assertJson([
//                'id' => $category->id,
//                'name' => $category->name,
//                'description' => $category->description,
//                'slug' => $category->slug,
//                'is_active' => $category->is_active,
//                'order' => $category->order
//        ]);
})->group('v1-categories');

todo('paginates the categories', function () {
    Category::factory(10)->create();

    $response = $this->getJson('/api/v1/categories?page=2');
    $response->assertStatus(200);
    $response->assertJsonStructure([
        'data' => [
            '*' => ['id', 'name', 'description', 'slug', 'is_active', 'order']
        ],
        'links' => ['first', 'last', 'prev', 'next'],
        'meta' => [
            'current_page', 'last_page', 'from', 'to', 'path',
            'per_page', 'total'
        ]
    ]);
})->group('v1-categories');

it('deletes a category', function () {
    $category = Category::factory()->create();

    deleteJson("/api/v1/categories/{$category->id}")
        ->assertStatus(Response::HTTP_NO_CONTENT);
    assertSoftDeleted('categories', ['id' => $category->id]);
})->group('v1-categories');
