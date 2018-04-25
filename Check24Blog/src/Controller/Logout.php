<?php
/**
 * Created by PhpStorm.
 * User: Hami.Yildiz
 * Date: 12.03.2018
 * Time: 10:59
 */

namespace Controller;

use Check24Framework\AbstractController;

class Logout extends AbstractController
{
    public function action($request)
    {
        session_destroy();
        $this->redirectTo('location:/');
    }
}