<?php

namespace Login;

use Check24Framework\Exception\LoginMistake;
use Check24Framework\Request;
use factory\User;

class Engine
{
    private $loginStatus;

    /**
     * @param Request $request
     * @return bool
     * @throws LoginMistake
     */
    public function validate(Request $request)
    {

        $username = $request->getFromPost('login');
        $password = $request->getFromPost('password');

        $user = User::create();
        $users = $user->checkUserByUserame($username);

        if(empty($username) || empty($password)){
            throw new LoginMistake('Das sind keine gultige Angaben');
        }
        $_SESSION['ID'] = $users[0]['ID'];

        if ($users !== false && password_verify($password, $users[0]['password'])) {
            $this->loginStatus = true;
        } else {
            throw new LoginMistake('Das sind keine gultige Angaben');
        }
        return $this->loginStatus;
    }
}