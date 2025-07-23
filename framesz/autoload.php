<?php

spl_autoload_register(function($class) {
    $class = str_replace("\\", "/", $class);
    $namespace = substr($class,0, strpos($class, "/"));

    switch($namespace) {
        case 'framesz':
            require DIR . "{$class}.php";
    }
});