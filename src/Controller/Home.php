<?php

namespace Controller;

use \Check24Framework\ControllerInterface;
use Check24Framework\ViewModel;


class Home implements ControllerInterface
{
    public function action($request)
    {
        $viewModel = new ViewModel();
        $viewModel->setTemplate('../template/start/welcome-page.phtml');
        return $viewModel;
    }
}