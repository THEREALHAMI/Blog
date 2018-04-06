<?php
/**
 * Created by PhpStorm.
 * User: hami.yildiz
 * Date: 06.04.2018
 * Time: 11:25
 */

namespace factory;

class Entry implements FactoryInterface
{
    public static function create()
    {
     return new \Repository\Entry(PdoFactory::create());
    }
}