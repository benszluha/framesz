<?php 

use Szluha\Framesz\Container;
use Szluha\Framesz\Database;
use Szluha\Framesz\Framesz;

$container = new Container();

Framesz::setContainer($container);

// Add the container bindings for the application
Framesz::bind("database", function(){
    $config = DIR . "framesz/config.php";
    $dsn = $config["database"];
    return new Database($dsn, "root", "root");
});