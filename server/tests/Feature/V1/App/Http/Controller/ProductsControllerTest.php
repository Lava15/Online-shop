<?php


use Modules\Catalog\Models\Product;
use Symfony\Component\HttpFoundation\Response;
use function Pest\Laravel\getJson;

it('get all products', function () {

    getJson('/api/v1/products')
        ->assertStatus(Response::HTTP_OK);

})->group('v1-products');


it('shows product by id', function () {
    $product = Product::factory()->create();

    getJson("api/v1/products/{$product->id}")
        ->assertOk()
        ->assertStatus(Response::HTTP_OK);
})->group('v1-products');
