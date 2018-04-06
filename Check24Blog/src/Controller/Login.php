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


        if ($request->getFromPost('checkingLogin')) {
            try {
                $engine = new Engine();
                $_SESSION['validate'] = $engine->validate($request);
               header('Location:/', true, 301);
               die();
            } catch (LoginMistake $exception) {
                echo $exception->getMessage();
            }
        }
        $viewModel = new ViewModel();
        $viewModel->setTemplate('../template/start/login.phtml');
        return $viewModel;
    }
}
