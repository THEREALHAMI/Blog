<?php

namespace Controller;

use Check24Framework\ControllerInterface;
use Check24Framework\ViewModel;

/**
 * Class Impressum
 * @package Controller
 */
class Impressum implements ControllerInterface
{
    /**
     * @param \Check24Framework\Request $request
     * @return ViewModel
     */
    public function action($request):viewModel
    {
        $viewModel = new ViewModel();
        $viewModel->setTemplate('../template/start/impressum.html');
        return $viewModel;
    }
}