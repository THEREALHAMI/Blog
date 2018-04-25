<?php
/**
 * Created by PhpStorm.
 * User: hami.yildiz
 * Date: 17.04.2018
 * Time: 10:47
 */

namespace Factory\Controller;


use Check24Framework\Factory\FactoryInterface;
use Check24Framework\DiContainer;
use Repository\Entry;

class Home implements FactoryInterface
{
    public static function create(string $classname,DiContainer $diContaier)
    {
        return new $classname($diContaier->get(Entry::class));
    }
}