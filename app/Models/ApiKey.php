<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ApiKey extends Model
{
    use HasFactory;

    protected $fillable = ['key'];

    public static function generate()
    {
        $apiKey = Str::random(60);

        while (self::where('key', $apiKey)->exists()) {
            $apiKey = Str::random(60);
        }

        return self::create(['key' => $apiKey]);
    }
}
