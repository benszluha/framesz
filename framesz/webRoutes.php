<?php

use framesz\Router;

$router = new Router();

// Add the routes here
$router->addGET("/", "index.php");

// Handle the request to the routes
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);