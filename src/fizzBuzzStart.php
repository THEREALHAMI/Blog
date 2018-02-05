<?php
function myAutoloader($classname) {
    include(__DIR__ . DIRECTORY_SEPARATOR . $classname. '.php');
}

spl_autoload_register('myAutoloader');

session_start();
if (!isset($_SESSION['count'])) {
    $_SESSION['count'] = 0;
} else {
    ++$_SESSION['count'];
}
$counter = $_SESSION['count'];
$start = new FizzBuzz\Engine();

$htmlVariables = [
    'counter' => $counter,
    'output' => $start->giveOutput($_POST, $counter)
];

// todo: variablen aus array generieren -> explode

// start output:
include('../templates/templatesFizzBuzz/fizz.phtml');