<?php

namespace Controller;

use Check24Framework\ControllerInterface;
use Check24Framework\ViewModel;
use Check24Framework\Request;

class AddEntrie implements ControllerInterface
{
    public function action(Request $request): viewModel
    {
        $viewModel = new ViewModel();
        $viewModel->setTemplate('../template/start/eintrag.phtml');
        return $viewModel;
    }
}