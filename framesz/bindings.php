<?php 

use framesz\Container;
use framesz\Database;
use framesz\Framesz;

$container = new Container();

Framesz::setContainer($container);

// Add the container bindings for the application
Framesz::bind("database", function(){
    $config = DIR . "framesz/config.php";
    $dsn = $config["database"];
    return new Database($dsn, "root", "root");
});