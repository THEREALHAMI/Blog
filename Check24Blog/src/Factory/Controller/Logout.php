<?php
/**
 * Created by PhpStorm.
 * User: hami.yildiz
 * Date: 18.04.2018
 * Time: 13:02
 */

namespace Factory\Controller;


use Check24Framework\DiContainer;
use Check24Framework\Factory\FactoryInterface;

class Logout implements FactoryInterface
{
    public static function create(string $classname, DiContainer $diContaier)
    {
        return new $classname();
    }
}