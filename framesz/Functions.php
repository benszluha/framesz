<?php

namespace Szluha\Framesz;

class Functions {
    public static function dd($value) {
        echo "<pre>";
            var_dump($value);
        echo "</pre>";
    }

    public static function loadCore($fileName) {
        require DIR . "framesz/{$fileName}";
    } 

    public static function loadController($fileName) {
        require DIR . "controllers/{$fileName}";
    }

    public static function loadView($fileName) {
        require DIR . "views/{$fileName}";
    }
}