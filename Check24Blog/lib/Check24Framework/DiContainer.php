<?php

namespace Check24Framework;

class DiContainer
{
    private $instances = [];
    private $config = [];

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    /**
     * @param $classname
     * @return mixed
     */
    public function get($classname)
    {
        if (isset($this->instances[$classname])) {
            return $this->instances[$classname];
        } else {
            return $this->createInstance($classname);
        }
    }

    /**
     * @param $classname
     * @return mixed
     */
    private function createInstance($classname)
    {
        $this->instances[$classname] = $this->config['factories'][$classname]::create($classname, $this);
        return $this->instances[$classname];
    }
}