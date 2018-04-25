<?php

namespace Check24Framework\Factory;


use Check24Framework\DiContainer;

class Invokable implements FactoryInterface
{
    /**
     * @return mixed
     */
    public static function create(string $classname, DiContainer $diContaier){
        return new $classname();
    }
}