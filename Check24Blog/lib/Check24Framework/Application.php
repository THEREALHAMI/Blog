<?php

namespace Check24Framework;

class Application
{
    public function init($config)
    {

        $frameworkConfig = include ('config.php');

        $config= array_merge_recursive($config, $frameworkConfig);
        $request = new Request($_GET, $_POST, $_FILES);
        $diContainer = new DiContainer($config);

        $router = $diContainer->get(Router::class);
        try {
            $controllerClass = $router->route($config, $_SERVER['REQUEST_URI']);
        } catch (\Exception $exception) {
            header("HTTP/1.0 404 Not Found");
            include('../template/error/404.html');
            die();
        }
        //todo: code ausführen
        $controller = $diContainer->get($controllerClass);
        $controller->setRouteConfig($config['routes']);
        $viewModel = $controller->action($request);
        $renderer = new Renderer();
        $renderer->render($viewModel);

    }
}