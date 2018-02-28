<?php

namespace Controller;

use Check24Framework\ViewModel;
use Check24Framework\ControllerInterface;
use Check24Framework\Request;

class ImageUploadSuccess implements ControllerInterface
{
    /**
     * @param Request $request
     * @return ViewModel
     *
     */
    public function action(Request $request):ViewModel
    {


            $viewModel = new ViewModel();
            $viewModel->setTemplate('../template/image-uploader/uploaded-image.phtml');
            $htmlOutput = ['title' => $request->getFromQuery('title'), 'path' => $request->getFromQuery('path')];
            $viewModel->setTemplateVariables($htmlOutput);
            return $viewModel;
    }

}