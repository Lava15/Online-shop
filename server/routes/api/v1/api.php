<?php


use Illuminate\Support\Facades\Route;

Route::prefix('categories')->group(
    base_path('routes/api/v1/categories.php')
);
Route::prefix('products')->group(
    base_path('routes/api/v1/products.php')
);
