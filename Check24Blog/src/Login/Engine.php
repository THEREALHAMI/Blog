<?php

namespace Login;

class Engine
{
    private $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * @param $username
     * @param $password
     * @return array
     */
    public function validate($username, $password)
    {
        $user = $this->user->checkUserByUsername($username);
        if ($user == true && password_verify($password, $user->getPassword())) {
            return [
                'validate' => true,
                'ID' => $user->getID()
            ];
        }
        return [
            'validate' => false,
            'ID' => null
        ];
    }
}