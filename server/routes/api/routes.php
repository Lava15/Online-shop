<?php

use Illuminate\Support\Facades\Route;

Route::prefix('v1')->as('v1:')->group(
    base_path('routes/api/v1/api.php')
);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
