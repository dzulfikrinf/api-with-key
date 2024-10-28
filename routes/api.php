<?php

use App\Http\Controllers\Api\SekolahController;
use App\Http\Controllers\Api\ApiKeyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('api')->group(function () {
    Route::get('/sekolah', [SekolahController::class, 'index']);
    Route::post('/sekolah', [SekolahController::class, 'store']);
    Route::get('/sekolah/{id}', [SekolahController::class, 'show']);
    Route::put('/sekolah/{id}', [SekolahController::class, 'update']);
    Route::delete('/sekolah/{id}', [SekolahController::class, 'destroy']);
});

Route::post('sekolah/generateAPIKey', [ApiKeyController::class, 'generateApiKey']);

// Route::apiResource('sekolah', SekolahController::class);
