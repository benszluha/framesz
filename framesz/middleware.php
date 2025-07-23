<?php

use framesz\middleware\Auth;
use framesz\middleware\Middleware;

Middleware::addMap("auth", Auth::class);

Middleware::showMap();