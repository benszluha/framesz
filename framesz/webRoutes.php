<?php

use Szluha\Framesz\Functions;
use Szluha\Framesz\Renderer;
use Szluha\Framesz\Router;
use Szluha\Framesz\Security;

$router = new Router();

// Add the routes here
$router->addGET("/", function() {
    Renderer::render("index.html.twig", [
        "Title" => "Framesz",
    ]);
});