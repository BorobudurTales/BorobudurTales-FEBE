<?php

namespace App\Providers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class ModelServiceProvider extends ServiceProvider
{
    public static function predict($image)
    {
        return Http::timeout(300)->retry(2, 2000)->attach('image', file_get_contents($image), $image->get_original_name())->post(env('MODEL_AI_URL'));
    }
}
