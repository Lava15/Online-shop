<?php


use Modules\Catalog\Enums\ProductStatus;
use Modules\Catalog\Models\Product;
use Symfony\Component\HttpFoundation\Response;
use function Pest\Laravel\assertDatabaseCount;
use function Pest\Laravel\getJson;
use function Pest\Laravel\postJson;

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
        'created_by' => auth()->id(),
        'updated_by' => auth()->id(),
        'deleted_by' => auth()->id(),
        'key' => fake()->uuid(),
        'sku' => fake()->postcode(),
        'title' => fake()->title(),
        'slug' => fake()->slug,
        'thumb_image' => fake()->image(),
        'description' => fake()->text(),
        'price' => 100_000,
        'retail_price' => 90_000,
        'sale_price' => 80_000,
        'quantity' => 5,
        'is_active' => true,
        'status' => ProductStatus::IN_STOCK,
    ];
    postJson('api/v1/products/', $product)
        ->assertOk()
        ->assertStatus(Response::HTTP_CREATED);

//    assertDatabaseCount('products', 1);
})->group('v1-products');
