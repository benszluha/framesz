<?php

namespace framesz;

use framesz\middleware\Middleware;
use framesz\Functions;

class Router {
    protected $routes = [];

    protected function addRoute($method, $uri, $controller){
        $this->routes = [
            "method" => $method,
            "uri" => $uri,
            "controller" => $controller,
            "middleware" => null
        ];

        return $this;
    }

    public function addGET($uri, $controller) {
        return $this->addRoute("GET", $uri, $controller);
    }

    public function addPOST($uri, $controller) {
        return $this->addRoute("POST", $uri, $controller);
    }

    public function addPUT($uri, $controller) {
        return $this->addRoute("PUT", $uri, $controller);
    }

    public function addPATCH($uri, $controller) {
        return $this->addRoute("PATCH", $uri, $controller);
    }

    public function addDELETE($uri, $controller) {
        return $this->addRoute("DELETE", $uri, $controller);
    }

    public function only($key) {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
        return $this;
    }

    public static function abort($errorCode = 404) {
        Functions::loadView("errors/{$errorCode}.php");
        exit();        
    } 

    public function route($uri, $method) {
        $method = strtoupper($method);

        foreach($this->routes as $route) {
            if($route['uri'] === $uri && strtoupper($route['method']) === $method) {
                Middleware::resolve($route['middleware']);
                Functions::loadController($route['controller']);               
            }
        }
    }

    public static function redirect($uri) {
        return header("location: {$uri}");
    }
}