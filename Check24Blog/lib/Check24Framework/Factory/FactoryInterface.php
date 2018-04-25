<?php

namespace Check24Framework\Factory;

use Check24Framework\DiContainer;

interface FactoryInterface
{
    public static function create(string $classname,DiContainer $diContaier);
}