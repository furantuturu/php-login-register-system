<?php

namespace Classes\Middleware;

class Middleware
{
    private const MIDDLEWARE_MAP = [
        'auth' => Auth::class,
        'guest' => Guest::class
    ];

    public static function resolve($key)
    {
        if (! $key) {
            return;
        }

        $middleware = static::MIDDLEWARE_MAP[$key] ?? false;

        if (! $middleware) {
            throw new \Exception("No matching middleware found on key: {$key}");
        }

        (new $middleware)->handle();
    }
}