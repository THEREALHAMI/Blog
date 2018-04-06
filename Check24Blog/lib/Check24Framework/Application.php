<?php

namespace Check24Framework;

use factory\HomeControllerFactory;

class Application
{
    public function init()
    {
        $request = new Request($_GET, $_POST, $_FILES);
        $router = new Router();
        $pdo =new \PDO('mysql:host=localhost;dbname=blog','root','');
        try {
            //todo: factory

            $controllerClass = $router->route(include('../src/config/config.php'), $_SERVER['REQUEST_URI']);

        } catch (\Exception $exception) {
            header("HTTP/1.0 404 Not Found");
            include('../template/error/404.html');
            die();
        }


        $controller = new $controllerClass;
        $viewModel = $controller->action($request, $pdo);
        $renderer = new Renderer();
        $renderer->render($viewModel);

    }
}