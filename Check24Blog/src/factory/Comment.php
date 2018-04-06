<?php

namespace factory;

class Comment implements FactoryInterface
{
    /**
     * @return \Repository\Comment
     */
    public static function create()
    {
        return new \Repository\Comment(PdoFactory::create());
    }
}