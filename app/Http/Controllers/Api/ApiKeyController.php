<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ApiKey;

class ApiKeyController extends Controller
{
    public function showGenerateApiKeyForm()
    {
        return view('generate-api-key');
    }

    public function generateApiKey(Request $request)
    {
        $apiKey = ApiKey::generate();

        return view('generate-api-key', ['apiKey' => $apiKey->key]);
    }
}
