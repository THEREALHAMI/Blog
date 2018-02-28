<?php

namespace Check24Framework;


class Router
{
    public function route(array $routes, string $path): string
    {
        $requestQuery = $_SERVER['QUERY_STRING'];

        if (!empty($requestQuery)) {
            $path= substr($path, 0, strpos($path, $requestQuery)-1);
        }

        if (isset($routes[$path])) {
            return $routes[$path];
        } else {
            throw new \Exception('');
        }

    }

}