<?php

use framesz\middleware\Auth;
use framesz\middleware\Guest;
use framesz\middleware\Middleware;

// Add Middleware to the application here
Middleware::addMap("auth", Auth::class);
Middleware::addMap("guest", Guest::class);

// Middleware::showMap();