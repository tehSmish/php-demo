<?php

namespace Core\middleware;

class middleware{
    public const MAP = [
        'guest' => guest::class,
        'auth' => auth::class
    ];

    public static function resolve($key){
        if(!$key){
            return;
        }        
        $middleware = static::MAP[$key] ?? false;
        if (!$middleware){
            throw new \Exception("no matching middleware key found for key '{$key}'. ");
        }                
        (new $middleware)->handle();
    }
}