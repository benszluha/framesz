<?php

namespace Szluha\Framesz;

class Renderer {
    /**
     * @param mixed $file
     * @param mixed $data
     */
    public static function render($file, $data = []): void {
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . "/../views");
        $twig = new \Twig\Environment($loader, [
            'cache' => __DIR__ . '/../cache',
            'debug' => true,
        ]);

        $twig->display($file, $data);
    }
}