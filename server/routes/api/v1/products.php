<?php

use App\Http\Controllers\Api\V1\ProductsController;
use Illuminate\Support\Facades\Route;


Route::get('/', [ProductsController::class, 'index']);
Route::get('/{product}', [ProductsController::class, 'show']);
Route::post('/', [ProductsController::class, 'store']);
