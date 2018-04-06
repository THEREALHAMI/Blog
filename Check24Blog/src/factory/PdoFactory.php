<?php

namespace factory;


class PdoFactory
{
    /**
 * @return \PDO
 */
    public static function create()
    {
        return new \PDO('mysql:host=localhost;dbname=blog','root','');
    }

}