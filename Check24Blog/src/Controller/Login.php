<?php

namespace Controller;

use Check24Framework\AbstractController;
use Check24Framework\ViewModel;

class Login extends AbstractController
{
    private $engine;

    public function __construct($engine)
    {
        $this->engine = $engine;
    }

    /**
     * @param \Check24Framework\Request $request
     * @return ViewModel
     */
    public function action($request): ViewModel
    {
        if ($request->getFromPost('checkingLogin')) {
            $username = $request->getFromPost('login');
            $password = $request->getFromPost('password');

            $validateArray = $this->engine->validate($username, $password);
            $_SESSION['validate'] = $validateArray['validate'];

            $_SESSION['ID'] = $validateArray['ID'];
            if ($_SESSION['validate'] == true) {
                $this->redirectTo('Location:/');
                die();
            }
            $errorMessage = 'Nicht gültige Angaben';
            $_SESSION['validate'] = null;
        }
        $viewModel = new ViewModel();
        $viewModel->setTemplate('../template/start/login.phtml');
        $viewModel->setTemplateVariables(['errorMessage' => !empty($errorMessage) ? $errorMessage : ""]);
        return $viewModel;
    }
}
