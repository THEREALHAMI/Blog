<?php
include('../bootstrap.php');


if (isset($_GET['side'])) {
    switch ($_GET['side']) {
        case 'imageUploader':
            include('../src/imageUploaderStart.php');
            break;
        case 'fizzBuzz':
            include('../src/fizzBuzzStart.php');
            break;
    }
} else {
    include('../template/start/welcomePage.phtml');
}

$router = new \Check24Framework\Router();

$controllerClass = $router->route(include('../config/config.php'), $_GET);

/** @var \Check24Framework\ControllerInterface $controller */
$controller = new $controllerClass();

$controller->action();

/*


$app = new Application();
$app->init();
*/