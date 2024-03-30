<?php

namespace  App\Controller;


class Controller
{
    protected $loader;
    protected $twig;
    public function __construct()
    {
        $this->loader = new \Twig\Loader\FilesystemLoader(dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'resource/template');
        $this->twig = new \Twig\Environment($this->loader, ['debug' => true]);
        $this->twig->addExtension(new \Twig\Extension\DebugExtension());
    }
}
