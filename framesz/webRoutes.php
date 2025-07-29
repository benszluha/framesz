<?php

use Szluha\Framesz\Router;
use Szluha\Framesz\Renderer;

$router = new Router();

// Add the routes here
$router->addGET("/", function() {
    Renderer::render("index.html.twig", [
        "Title" => "Framesz",
    ]);
});