<?php

namespace Entity;

class User
{
    private $loginname = '';
    private $password = '';
    private $ID = 0;

    /**
     * @return string
     */

    public function getLoginname(): string

    {
        return $this->loginname;
    }

    /**
     * @param string $loginname
     * @return User
     */
    public function setLoginname(string $loginname): User
    {
        $this->loginname = $loginname;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return int
     */
    public function getID(): int
    {
        return $this->ID;
    }

    /**
     * @param int $ID
     * @return User
     */
    public function setID(int $ID): User
    {
        $this->ID = $ID;
        return $this;
    }

}