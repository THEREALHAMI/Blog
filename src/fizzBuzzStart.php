<?php

class FizzBuzzController implements \Check24Framework\ControllerInterface
{
    public function action($request)
    {
        // TODO: Implement action() method.
    }

}


session_start();
if (!isset($_SESSION['count'])) {
    $_SESSION['count'] = 0;
} else if (isset($_POST['los'])) {
    ++$_SESSION['count'];
}
$counter = $_SESSION['count'];

$start = new FizzBuzz\Engine();

$htmlVariables = [
    'counter' => $counter,
    'output' => $start->giveOutput($_POST, $counter)
];

// todo: variablen aus array generieren -> explode

$eachSentenceFromOutput = explode('.', $htmlVariables['output']['answer']);

if (!isset($eachSentenceFromOutput[1])) {
    $eachSentenceFromOutput[1] = "";
}

// start output:
include('../template/fizzbuzz/fizz.phtml');