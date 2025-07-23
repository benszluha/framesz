<?php

namespace framesz\middleware;

use Exception;

class Middleware{
    protected static $map = [];

    public static function showMap() {
        echo "<pre>";
        var_dump(static::$map);
        echo "</pre>";
    }
    public static function addMap($key, $class) {
        static::$map[$key] = $class;
    }

    public static function resolve($key) {
        if (! $key) {
            return null;
        }

        if (! isset(static::$map[$key])) {
            throw new Exception("No matching middleware found for: {$key}");
        }

        $middleWare = static::$map[$key];
        return (new $middleWare($key))->handle(); 
    }
}