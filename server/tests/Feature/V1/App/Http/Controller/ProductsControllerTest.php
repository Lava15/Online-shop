<?php


use Modules\Catalog\Enums\ProductStatus;
use Modules\Catalog\Models\Product;
use Symfony\Component\HttpFoundation\Response;
use function Pest\Laravel\assertDatabaseCount;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\deleteJson;
use function Pest\Laravel\getJson;
use function Pest\Laravel\postJson;
use function Pest\Laravel\putJson;

it('get all products', function () {

    getJson('/api/v1/products')
        ->assertOk()
        ->assertStatus(Response::HTTP_OK);

})->group('v1-products');


it('shows product by id', function () {
    $product = Product::factory()->create();

    getJson("api/v1/products/{$product->id}")
        ->assertOk()
        ->assertStatus(Response::HTTP_OK);
})->group('v1-products');

it('creates a product', function () {
    $product = [
        'created_by' => 1,
        'updated_by' => 1,
        'deleted_by' => 1,
        'sku' => 'sku-1000',
        'title' => [
            'uz' => 'uz title',
            'ru' => 'ru title ',
            'en' => 'en title',
        ],
        'description' => [
            'uz' => 'uz description',
            'ru' => 'ru description ',
            'en' => 'en description',
        ],
        'slug' => 'slug-of-product',
        'thumb_image' => 'path/to/image',
        'price' => 100_000,
        'retail_price' => 90_000,
        'sale_price' => 80_000,
        'quantity' => 5,
        'is_active' => true,
        'status' => ProductStatus::IN_STOCK->value,
    ];
    postJson('api/v1/products', $product)
        ->assertOk()
        ->assertStatus(status: Response::HTTP_OK);
    assertDatabaseCount(table: 'products', count: 1);

})->group('v1-products');

it('updates a product', function () {
    $product = Product::factory()->create(['title' =>
        [
            'uz' => 'uz after update',
            'ru' => 'ru after update',
            'en' => 'en after update',
        ]
    ]);

    putJson(route('v1:products:update', $product->key), ['title' => 'after update'])
        ->assertStatus(status: Response::HTTP_ACCEPTED);

//    assertDatabaseHas(table: 'products', data: ['title' => [
//        'uz' => 'uz after update',
//        'ru' => 'ru after update',
//        'en' => 'en after update',
//    ]]);

})->group('v1-products');

it('deletes a product', function () {
    $product = Product::factory()->create();
    deleteJson(route('v1:products:delete', $product->key))
        ->assertStatus(Response::HTTP_NO_CONTENT);
})->group('v1-products');
