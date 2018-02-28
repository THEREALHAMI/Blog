<?php

namespace Controller;

use Check24Framework\Request;
use FizzBuzz\Engine;
use \Check24Framework\ControllerInterface;
use Check24Framework\ViewModel;

class FizzBuzz implements ControllerInterface
{
    public function action(Request $request)
    {

        if (!isset($_SESSION['count'])) {
            $_SESSION['count'] = 0;
        } else {
            if (isset($_POST['los'])) {
                ++$_SESSION['count'];
            }
        }
        $counter = $_SESSION['count'];

        $fizzBuzzEngine = new Engine();

        $htmlVariables = [
            'counter' => $counter,
            'output' => $fizzBuzzEngine->giveOutput($request, $counter),

        ];

        $eachSentenceFromOutput = explode('.', $htmlVariables['output']['answer']);

        if (!isset($eachSentenceFromOutput[1])) {
            $eachSentenceFromOutput[1] = "";
        }

        $outputArray = [
            'counter' => $counter,
            'output' => $eachSentenceFromOutput
        ];

        $viewModel = new ViewModel();
        $viewModel->setTemplate('../template/fizzbuzz/fizz.phtml');
        $viewModel->setTemplateVariables($outputArray);

        return $viewModel;
    }
}
