<?php

namespace Login;

use Check24Framework\Exception\LoginMistake;
use Check24Framework\Request;

class Engine
{
    private $loginStatus;

    public function validate(Request $request)
    {
        $mysql = new \mysqli('localhost', 'root', '', 'blog');
        $username = $request->getFromPost('login');
        $password = $request->getFromPost('password');
        $query = $mysql->query("SELECT * FROM userdata WHERE loginname = '$username'");
        $user = $query->fetch_assoc();
        $_SESSION['ID'] = $user['ID'];
        if ($user!==false&&password_verify($password,$user['password'])) {
            $this->loginStatus = true;
        }else{
            throw new LoginMistake('Das sind keine gultige Angaben');
        }
        return $this->loginStatus;
    }
}