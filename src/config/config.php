<?php
//gibt an welche Routen vorhanden sind
//use benutzen
//fallbackresource
return [
    '/fizz-buzz' => Controller\FizzBuzz::class,
    '/image-uploader' => Controller\ImageUploader::class,
    '/upload' => Controller\ImageUploadSuccess::class,//todo: aufteilen : verschiedene Actions
    '/'=> Controller\Home::class
];