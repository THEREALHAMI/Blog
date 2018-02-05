<?php

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
    include('../templates/templatesStart/welcomePage.phtml');
}



/*
include('bootstrap.php');

$app = new Application();
$app->init();
*/