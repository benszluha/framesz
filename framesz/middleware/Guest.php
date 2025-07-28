<?php

namespace Szluha\Framesz\middleware;

class Guest {
    public function handle() {
        if (isset($_SESSION['user'])) {
            header("location: /");
            exit();
        }
    }
}