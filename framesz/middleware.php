<?php

use Szluha\Framesz\middleware\Auth;
use Szluha\Framesz\middleware\Guest;
use Szluha\Framesz\middleware\Middleware;

// Add Middleware to the application here
Middleware::addMap("auth", Auth::class);
Middleware::addMap("guest", Guest::class);

// Middleware::showMap();