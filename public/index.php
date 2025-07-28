<?php

use Szluha\Framesz\Functions;

const DIR = __DIR__ . "/../";
require DIR . "framesz/Functions.php";
require DIR . "vendor/autoload.php";

//Functions::loadCore("autoload.php");
Functions::loadCore("bindings.php");
Functions::loadCore("middleware.php");

Functions::loadCore("webRoutes.php");