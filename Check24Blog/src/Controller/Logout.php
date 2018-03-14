<?php
/**
 * Created by PhpStorm.
 * User: Hami.Yildiz
 * Date: 12.03.2018
 * Time: 10:59
 */

namespace Controller;

use Check24Framework\ControllerInterface;



class logout implements ControllerInterface
{
    public function action($request)
    {
        session_destroy();
        header('location:/',true,301);
    }
}