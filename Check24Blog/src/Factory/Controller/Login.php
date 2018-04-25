<?php
/**
 * Created by PhpStorm.
 * User: hami.yildiz
 * Date: 18.04.2018
 * Time: 09:49
 */

namespace Factory\Controller;



use Check24Framework\DiContainer;
use Check24Framework\Factory\FactoryInterface;
use Login\Engine;

class Login implements FactoryInterface
{
    public static function create(string $classname, DiContainer $diContainer)
    {
        return new $classname($diContainer->get(Engine::class));
    }
}