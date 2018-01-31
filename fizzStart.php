<?php

include 'FizzBuzz.php';

session_start();
if (!isset($_SESSION['count'])) {
    $_SESSION['count'] = 0;
} else {
    ++$_SESSION['count'];
}
$counter = $_SESSION['count'];
$start = new FizzBuzz();

$htmlVariabels = [
    'counter' => $counter,
    'output' => $start->giveOutput($_GET, $counter)
];

// todo: variablen aus array generieren -> explode

// start output:
include('template/fizz.phtml');