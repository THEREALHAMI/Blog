<?php
/**
 * Created by PhpStorm.
 * User: hami.yildiz
 * Date: 13.02.2018
 * Time: 10:10
 */

namespace config;


class Request
{
    private $requestArray = [];

    /**
     * @return array
     *
     */
    public function getRequest() :array
    {
        $this->mergeRequestArray();
        return $this->requestArray;
    }


    private function mergeRequestArray()
    {
        $this->requestArray = Array_merge($_GET, $_POST);
    }
}