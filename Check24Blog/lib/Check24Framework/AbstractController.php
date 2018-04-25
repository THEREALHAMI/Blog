<?php

namespace Check24Framework;

abstract class AbstractController implements \Check24Framework\ControllerInterface
{
    private $routeConfig = [];

    public function redirectTo(string $path)
    {
        header($path, true, 301);
        die();
    }

    public function setRouteConfig($routeConfig)
    {
        $this->routeConfig = $routeConfig;
    }

    public function redirectToRoute(string $path)
    {
        if (array_key_exists($path, $this->routeConfig)) {
            header('Location: ' . $path, true, 301);
            exit();
        }
    }
}