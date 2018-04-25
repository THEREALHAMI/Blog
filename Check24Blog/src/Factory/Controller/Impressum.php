<?php
/**
 * Created by PhpStorm.
 * User: hami.yildiz
 * Date: 18.04.2018
 * Time: 13:06
 */

namespace Factory\Controller;


use Check24Framework\DiContainer;
use Check24Framework\Factory\FactoryInterface;

class Impressum implements FactoryInterface
{
    public static function create(string $classname, DiContainer $diContaier)
    {
     return new $classname();
    }
}