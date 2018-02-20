<?php

namespace Controller;

use Check24Framework\ViewModel;
use ImageUploader\Engine;
use Check24Framework\ControllerInterface;
use Check24Framework\Request;

class ImageUploadSuccess implements ControllerInterface
{
    /**
     * @param Request $request
     * @return ViewModel
     *
     */
    public function action(Request $request)
    {


            try {
                $imageUploaderEngine = new Engine();
                $htmlOutput = $imageUploaderEngine->processFile($request);
            } catch (\Exception $exeption) {
                echo $exeptionMessage = $exeption->getMessage();
                die();
            }
            $viewModel = new ViewModel();
            $viewModel->setTemplate('../template/image-uploader/uploaded-image.phtml');
            $viewModel->setTemplateVariable($htmlOutput);
            return $viewModel;
    }

}