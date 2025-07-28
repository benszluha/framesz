<?php

namespace Szluha\Framesz;

use Szluha\Framesz\Container;

class Framesz {
    protected static $container;

    public static function setContainer(Container $container) {
        static::$container = $container;
    }

    public static function bind($key, $callback) {
        static::$container->bind($key, $callback);
    }

    public static function resolve($key) {
        return static::$container->resolve($key);
    }

    public static function container() {
        echo "<pre>";
            var_dump(static::$container);
        echo "</pre>";
        exit();
    }
}