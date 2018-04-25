<?php

namespace Factory\Controller;

use Check24Framework\DiContainer;
use Check24Framework\Factory\FactoryInterface;
use Repository\User;

class LoginEngine implements FactoryInterface
{
    public static function create(string $classname, DiContainer $diContainer)
    {
        return new $classname($diContainer->get(User::class));
    }
}