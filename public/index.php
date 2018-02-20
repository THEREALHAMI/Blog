<?php
session_start();
include('../bootstrap.php');

var_dump($_SERVER['REQUEST_URI']);

$app = new Check24Framework\Application();
$app->init();


//applicationerstellen klasse
//output buffer  ob_start
// alle ausgaben durch output bufferung sammeln
//template engine
//über header weiterleitung
//redirects untrersheidung zwischen tempo und permanent
//router über url maappen $Server