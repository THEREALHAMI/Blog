<?php
/**
 * Created by PhpStorm.
 * User: hami.yildiz
 * Date: 05.04.2018
 * Time: 11:48
 */

namespace Repository;
use factory\PdoFactory;

class User
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = PdoFactory::create();
    }

    /**
     * @param $username
     * @return mixed
     */
    public function checkUserByUserame($username)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM userdata WHERE loginname = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetchAll();

        return $user;
    }
}