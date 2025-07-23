<?php

namespace framesz\middleware;

class Auth {
    public function handle($key) {
        if (! isset($_SESSION[$key])) {
            header("location: /login");
            exit();
        }
    }
}