<?php

namespace Controller;

use Check24Framework\Request;
use Check24Framework\ViewModel;
use \Check24Framework\ControllerInterface;

class ImageUploader implements ControllerInterface
{
    /**
     * @param Request $request
     * @return ViewModel
     */
    public function action(Request $request)
    {

        $viewModel = new ViewModel();
        $viewModel->setTemplate('../template/image-uploader/image.phtml');
        return $viewModel;
    }
}