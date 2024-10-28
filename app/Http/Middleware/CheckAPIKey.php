<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\ApiKey;

class CheckApiKey
{
    public function handle(Request $request, Closure $next)
    {
        $apiKey = $request->header('api_key');

        if (!ApiKey::where('key', $apiKey)->exists()) {
            return response()->json([
                'status' => false,
                'message' => 'API key is missing or invalid'
            ], 401);
        }

        return $next($request);
    }
}
