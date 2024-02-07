<?php

use App\Http\Controllers\Api\V1\CartController;
use Illuminate\Support\Facades\Route;


Route::get('/', [CartController::class, 'view'])->name('view');
Route::post('/', [CartController::class, 'add'])->name('add');
Route::put('/{cart}', [CartController::class, 'update'])->name('update');
Route::delete('/{cart}' , [CartController::class, 'remove'])->name('remove');
