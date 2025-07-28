<?php

namespace Szluha\Framesz;

use \Exception;

class Container {
    protected $bindings = [];

    public function bind($key, $callback) {
        $this->bindings[$key] = [$callback];
    }

    public function resolve($key) {
        if (! array_key_exists($key, $this->bindings)) {
            throw new Exception("No key found for: {$key}.");
        }

        return call_user_func($this->bindings[$key]);
    }
}