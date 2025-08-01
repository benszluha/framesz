<?php

use Szluha\Framesz\Functions;
use Szluha\Framesz\Renderer;
use Szluha\Framesz\Router;
use Szluha\Framesz\Security;

// Create the cache folder if it does not exist
$cachePath = __DIR__ . "/../cache";
if (!file_exists($cachePath)) {
    mkdir($cachePath,0777, true);
}

$router = new Router();

// Add the routes here
$router->addGET("/", function() {
    Renderer::render("index.html.twig", [
        "Title" => "Framesz",
    ]);
});