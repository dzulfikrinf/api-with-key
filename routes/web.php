<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiKeyController;

Route::get('/', [ApiKeyController::class, 'showGenerateApiKeyForm'])->name('generate.api.key.form');
Route::post('/generate-api-key', [ApiKeyController::class, 'generateApiKey'])->name('generate.api.key');
