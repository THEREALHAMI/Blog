<?php

namespace Controller;

use Check24Framework\ControllerInterface;
use Check24Framework\ViewModel;


class Impressum implements ControllerInterface
{
    public function action($request):viewModel
    {
        $viewModel = new ViewModel();
        $viewModel->setTemplate('../template/start/impressum.html');
        return $viewModel;
    }
}