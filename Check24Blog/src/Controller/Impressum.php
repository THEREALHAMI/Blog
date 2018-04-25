<?php

namespace Controller;

use Check24Framework\AbstractController;
use Check24Framework\ViewModel;

/**
 * Class Impressum
 * @package Controller
 */
class Impressum extends AbstractController
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