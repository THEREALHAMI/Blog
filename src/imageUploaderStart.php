<?php
function myAutoloader($classname) {
    include(__DIR__ . DIRECTORY_SEPARATOR . $classname. '.php');
}

spl_autoload_register('myAutoloader');


switch(isset($_GET['page'])) {
    case 'upload';
        $start = new ImageUploader();
        $htmlOutput = $start->processFile($_POST, $_FILES);
        include('../templates/templatesImageUploader/viewUploadedImage.phtml');
    break;
    default:
        include('../templates/templatesImageUploader/imageHtml.phtml');
}

