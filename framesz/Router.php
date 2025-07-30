<?php

namespace Szluha\Framesz;

use Szluha\Framesz\middleware\Middleware;
use Szluha\Framesz\Functions;

class Router {
    protected static $routes = [];

    protected function addRoute($method, $uri, $func){
        static::$routes[] = [
            "method" => $method,
            "uri" => $uri,
            "callback" => $func,
            "middleware" => null
        ];

        return $this;
    }

    public function addGET($uri, $func) {
        return $this->addRoute("GET", $uri, $func);
    }

    public function addPOST($uri, $func) {
        return $this->addRoute("POST", $uri, $func);
    }

    public function addPUT($uri, $func) {
        return $this->addRoute("PUT", $uri, $func);
    }

    public function addPATCH($uri, $func) {
        return $this->addRoute("PATCH", $uri, $func);
    }

    public function addDELETE($uri, $func) {
        return $this->addRoute("DELETE", $uri, $func);
    }

    public function only($key) {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
        return $this;
    }

    public static function abort($errorCode = 404) {
        Functions::loadView("errors/{$errorCode}.php");
        exit();        
    } 

    public static function route($uri, $method) {
        $method = strtoupper($method);

        foreach(static::$routes as $route) {
            if($route['uri'] === $uri && strtoupper($route['method']) === $method) {
                Middleware::resolve($route['middleware']);
                call_user_func($route['callback']);               
            }
        }
    }

    public static function redirect($uri) {
        return header("location: {$uri}");
    }
}