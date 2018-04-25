<?php
/**
 * Created by PhpStorm.
 * User: hami.yildiz
 * Date: 06.04.2018
 * Time: 11:48
 */

namespace Factory\Repository;

use Check24Framework\DiContainer;
use Check24Framework\Factory\FactoryInterface;

class User implements FactoryInterface
{
    /**,
     * @param string $classname
     * @param DiContainer $diContainer
     * @return mixed
     */
    public static function create(string $classname, DiContainer $diContainer)
    {
        return new $classname($diContainer->get('PDO'));
    }
}