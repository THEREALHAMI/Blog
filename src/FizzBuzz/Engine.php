<?php

namespace FizzBuzz;

class Engine
{
    /**
     * @param array $input
     * @param int $sessionCounter
     * @return string
     */
    public function giveOutput(array $input, int $sessionCounter): array
    {
        $answer = '';
        if (!isset($_SESSION['highScore'])){
            $_SESSION['highScore'] = 0;
        }
        if (isset($input["los"])) {
            if ($input["value"] == $this->checkTheInput($sessionCounter)) {
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
        // todo: typesafety debuggen
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

