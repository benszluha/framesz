<?php

use framesz\Functions;

const DIR = __DIR__ . "/../";
require DIR . "framesz/Functions.php";

Functions::loadCore("autoload.php");
Functions::loadCore("bindings.php");
Functions::loadCore("middleware.php");

Functions::loadCore("webRoutes.php");