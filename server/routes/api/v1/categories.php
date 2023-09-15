<?php


use App\Http\Controllers\Api\V1\CategoriesController;
use Illuminate\Support\Facades\Route;


Route::get('/', [CategoriesController::class, 'index']);
