<?php
function myAutoloader($classname) {
    include(__DIR__ . "/" . $classname. '.php');
}

spl_autoload_register('myAutoloader');


switch(isset($_GET['page'])) {
    case 'upload';
        $start = new ImageUploader();
        $htmlOutput = $start->processFile($_POST, $_FILES);
        include('template/viewUploadedImage.phtml');
    break;
    default:
        include('template/imageHtml.phtml');
}

