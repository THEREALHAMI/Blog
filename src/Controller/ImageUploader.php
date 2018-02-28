<?php

namespace Controller;

use Check24Framework\Exception\WrongSizeException;
use Check24Framework\Exception\IsNotAnPicture;
use Check24Framework\Request;
use Check24Framework\ViewModel;
use \Check24Framework\ControllerInterface;
use ImageUploader\Engine;

class ImageUploader implements ControllerInterface
{
    /**
     * @param Request $request
     * @return ViewModel
     * @throws \Exception
     */
    public function action(Request $request): ViewModel
    {

        $viewModel = new ViewModel();
        $viewModel->setTemplate('../template/image-uploader/image.phtml');
        $viewModel->setTemplateVariables(['errorMessage' => '']);


        if ($request->postFromQuery('upload')) {
            try {
                $imageUploaderEngine = new Engine();
                $htmlOutput = $imageUploaderEngine->processFile($request);
                header("Location:/upload?title=" . $htmlOutput['title'] . '&path=' . $htmlOutput['path'], true, 301);
            } catch (WrongSizeException $w) {
                $viewModel->setTemplateVariables(['errorMessage' => $w->getMessage()]);

            } catch (IsNotAnPicture $exeption) {

                $viewModel->setTemplateVariables(['errorMessage' => $exeption->getMessage()]);
            }
        }

        return $viewModel;
    }
}