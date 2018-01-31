<?php
function myAutoloader($classname) {
    include(__DIR__ . "/". $classname. '.php');
}

spl_autoload_register('myAutoloader');

session_start();
if (!isset($_SESSION['count'])) {
    $_SESSION['count'] = 0;
} else {
    ++$_SESSION['count'];
}
$counter = $_SESSION['count'];
$start = new FizzBuzz();

$htmlVariables = [
    'counter' => $counter,
    'output' => $start->giveOutput($_GET, $counter)
];

// todo: variablen aus array generieren -> explode

// start output:
include('template/fizz.phtml');