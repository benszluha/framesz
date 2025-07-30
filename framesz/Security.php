<?php

namespace Szluha\Framesz;

class Security {
    protected static $csrf_token;

    public static function newCSRF() {
        static::$csrf_token = '';
        static::$csrf_token = bin2hex(random_bytes(32));
    }

    public static function getCSRF() {
        return static::$csrf_token;
    }
}