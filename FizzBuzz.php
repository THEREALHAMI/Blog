<?php

class FizzBuzz
{
    /**
     * @param $input
     * @param $sessionCounter
     * @return string
     */
    public function giveOutput($input, $sessionCounter): string
    {
        $answer = '';
        if (isset($input["los"])) {
            if ($input["value"] == $this->checkTheInput($sessionCounter)) {
                $answer = 'Das ist richtig';
            } elseif ($sessionCounter === 0) {
                $answer = "Beginn bei 1";
            } else {
                session_destroy();
                $answer = 'Das ist nicht richtig!!!<br><br> Dein Highscore :' . --$sessionCounter;

            }
        }
        return $answer;
    }

    /**
     * @param string $inputValue
     * @return string
     */
    private function checkTheInput(string $inputValue): string
    {
        // todo: typesafety debuggen
        if ($inputValue % 3 == 0 && $inputValue % 5 == 0) {
            return "fizzbazz";
        } elseif ($inputValue % 5 == 0) {
            return "bazz";
        } elseif ($inputValue % 3 == 0) {
            return "fizz";
        } else {
            return $inputValue;
        }
    }


}

