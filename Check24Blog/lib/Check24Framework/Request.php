<?php

namespace Check24Framework;


class Request
{
    private $get;
    private $post;
    private $files;

    public function __construct($get, $post, $files)
    {
        $this->get = $get;
        $this->post = $post;
        $this->files = $files;

    }

    public function getFromQuery(string $name): string
    {
        if (isset($this->get[$name])){
            return $this->get[$name];
        }
        return false;
    }

    public function postFromQuery(string $name): string
    {
        if (isset($this->post[$name])){
            return $this->post[$name];
        }
        return false;
    }

    public function fileFromQuery(string $arrayName, string $name): string
    {
        return $this->files[$arrayName][$name];
    }
}