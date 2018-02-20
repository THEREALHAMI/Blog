<?php

namespace Check24Framework;


class Router
{
    public function route(array $routes, string $path): string
    {
        // todo: implement code here

        if (isset($routes[$path])) {
            return $routes[$path];
        } else {
            throw new \Exception('');
        }

    }

}