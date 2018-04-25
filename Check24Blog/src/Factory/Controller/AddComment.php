<?php
/**
 * Created by PhpStorm.
 * User: hami.yildiz
 * Date: 18.04.2018
 * Time: 12:56
 */

namespace Factory\Controller;


use Check24Framework\Factory\FactoryInterface;
use Check24Framework\DiContainer;
use Repository\Comment;

class AddComment implements FactoryInterface
{
    public static function create(string $classname,DiContainer $diContaier)
    {
        return new $classname($diContaier->get(Comment::class));
    }
}