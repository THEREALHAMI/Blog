<?php

namespace Login;

use Check24Framework\Exception\LoginMistake;
use Check24Framework\Request;

class Engine
{
    private $loginStatus;

    /**
     * @param Request $request
     * @return bool
     * @throws LoginMistake
     */
    public function validate(Request $request, \PDO $pdo)
    {
        $stmt = $pdo->prepare("SELECT * FROM userdata WHERE loginname = :username");

        $username = $request->getFromPost('login');
        $password = $request->getFromPost('password');

        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $user = $stmt->fetchAll();
        $_SESSION['ID'] = $user[0]['ID'];

        if ($user !== false && password_verify($password, $user[0]['password'])) {
            $this->loginStatus = true;
        } else {
            throw new LoginMistake('Das sind keine gultige Angaben');
        }

        return $this->loginStatus;
    }
}