<?php

namespace Controller;


use Check24Framework\ControllerInterface;
use Check24Framework\ViewModel;

class login implements ControllerInterface
{

    public function action($request):ViewModel
    {
        $viewModel = new ViewModel();
        $viewModel->setTemplate('../template/start/login.phtml');
        return $viewModel;
    }
}