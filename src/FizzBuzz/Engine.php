<?php

namespace FizzBuzz;

use Check24Framework\Request;

class Engine
{
    /**
     * @param Request $input
     * @param int $sessionCounter
     * @return array
     */
    public function giveOutput(Request $input, int $sessionCounter): array
    {
        $answer = '';
        if (!isset($_SESSION['highScore'])){
            $_SESSION['highScore'] = 0;
        }
        if ($input->postFromQuery('los')) {
            if ($input->postFromQuery('value') == $this->checkTheInput($sessionCounter)) {
                $answer = 'Das ist richtig!';
                if ($_SESSION['highScore'] < $sessionCounter){
                    $_SESSION['highScore'] = $sessionCounter;
                }
            } elseif ($sessionCounter === 0) {
                $answer = 'Beginn bei 1!';
            } else {
                $answer = "Das ist nicht richtig!!!.Dein höchster Highscore : " . $_SESSION['highScore'];
                $_SESSION['count'] = 0;
            }
        }
        return [
            'answer' => $answer,
            'highScore' => $_SESSION['highScore']
        ];
    }


    /**
     * @param int $counter
     * @return string
     */
    private function checkTheInput(int $counter): string
    {
        if ($counter % 3 == 0 && $counter % 5 == 0) {
            return "FizzBuzz";
        } elseif ($counter % 5 == 0) {
            return "Buzz";
        } elseif ($counter % 3 == 0) {
            return "Fizz";
        } else {
            return (string)$counter;
        }
    }


}

