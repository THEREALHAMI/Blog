<?php
/**
 * Created by PhpStorm.
 * User: hami.yildiz
 * Date: 06.04.2018
 * Time: 11:48
 */

namespace factory;


class User implements FactoryInterface
{
    public static function create()
    {
        return \Repository\User(PdoFactory::create());
    }
}