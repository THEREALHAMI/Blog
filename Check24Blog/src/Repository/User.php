<?php


namespace Repository;

class User
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param $username
     * @return mixed
     */
    public function checkUserByUsername($username)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM userdata WHERE loginname = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user =  $stmt->fetchObject('\Entity\User');
        return $user;
    }
}