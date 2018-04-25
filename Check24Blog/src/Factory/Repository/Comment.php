<?php

namespace Factory\Repository;

use Check24Framework\DiContainer;
use Check24Framework\Factory\FactoryInterface;

class Comment implements FactoryInterface
{
    /**
     * @param string $classname
     * @param DiContainer $diContainer
     * @return mixed
     */
    public static function create(string $classname, DiContainer $diContainer)
    {
        return new $classname($diContainer->get('PDO'));
    }
}