<?php

namespace Controller;

use Check24Framework\Exception\LoginMistake;
use Check24Framework\ControllerInterface;
use Check24Framework\ViewModel;
use Login\Engine;

class Login implements ControllerInterface
{
    /**
     * @param \Check24Framework\Request $request
     * @return ViewModel
     */
    public function action($request): ViewModel
    {
        $viewModel = new ViewModel();
        $viewModel->setTemplate('../template/start/login.phtml');

        if ($request->getFromPost('checkingLogin')) {
            try {
                $engine = new Engine();
                $engine->validate($request);
                $_SESSION['validate'] = true;
               header('Location:/', true, 301);
            } catch (LoginMistake $exception) {
                echo $exception->getMessage();
            }
        }
        return $viewModel;
    }
}