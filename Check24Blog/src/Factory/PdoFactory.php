<?php

namespace Factory;


use Controller\Pdo;

class PdoFactory
{
    /**
 * @return \PDO
 */
    public static function create()
    {
        return new Pdo('mysql:host=localhost;dbname=blog','root','');
    }

}