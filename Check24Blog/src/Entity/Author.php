<?php

namespace Entity;

class Author
{
    private $loginname = '';
    private $password = '';
    private $id = 0;

    /**
     * @return string
     */
    public function getLoginname(): string
    {
        return $this->loginname;
    }

    /**
     * @param string $loginname
     * @return Author
     */
    public function setLoginname(string $loginname): Author
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
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Author
     */
    public function setId(int $id): Author
    {
        $this->id = $id;
        return $this;
    }

}