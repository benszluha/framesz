<?php

use Szluha\Framesz\Functions;
use Szluha\Framesz\Router;

const DIR = __DIR__ . "/../";
require DIR . "framesz/Functions.php";
require DIR . "vendor/autoload.php";

// Functions::loadCore("autoload.php");
Functions::loadCore("bindings.php");
Functions::loadCore("middleware.php");
Functions::loadCore("webRoutes.php");

// Handle the routing
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

Router::route($uri, $method);