<?php

namespace Szluha\Framesz;

class Renderer {
    protected $loader;
    protected $twig;

    public function __construct() {
        $this->loader = new \Twig\Loader\FilesystemLoader( DIR . 'views');
        $this->twig = new \Twig\Environment($this->loader, [
            'cache' => DIR . 'cache',
        ]);
    }

    public function render($fileName, $data = []) {
        $this->twig->render($fileName, $data);
    }
}