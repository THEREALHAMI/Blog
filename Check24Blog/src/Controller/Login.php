<?php

namespace Controller;


use Check24Framework\ControllerInterface;
use Check24Framework\ViewModel;

class Login implements ControllerInterface
{

    public function action($request): ViewModel
    {
        $viewModel = new ViewModel();
        $viewModel->setTemplate('../template/start/login.phtml');

        if ($request->postFromQuery('login') == 'admin' && $request->postFromQuery('password') == '123') {
            $viewModel->setTemplate('../template/start/startseite.phtml');

        }
        return $viewModel;
    }
}