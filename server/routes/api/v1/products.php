<?php

use App\Http\Controllers\Api\V1\ProductsController;
use Illuminate\Support\Facades\Route;


Route::get('/', [ProductsController::class, 'index'])->name('index');
Route::get('/{product}', [ProductsController::class, 'show'])->name('show');
Route::post('/', [ProductsController::class, 'store'])->name('store');
