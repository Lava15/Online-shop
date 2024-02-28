<?php


use Illuminate\Support\Facades\Route;

Route::prefix('categories')->as('categories:')->group(
    base_path('routes/api/v1/categories.php')
);
Route::prefix('products')->as('products:')->group(
    base_path('routes/api/v1/products.php')
);

Route::prefix('cart')->as('cart:')->group(
    base_path('routes/api/v1/cart.php')
);
