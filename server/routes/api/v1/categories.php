<?php

use App\Http\Controllers\Api\V1\CategoriesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CategoriesController::class, 'index']);
Route::get('/{category}', [CategoriesController::class, 'show']);
Route::delete('/{category}', [CategoriesController::class, 'destroy']);
Route::post('/', [CategoriesController::class, 'store']);
Route::put('/{category}', [CategoriesController::class, 'update']);
