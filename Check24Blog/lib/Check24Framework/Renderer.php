<?php

namespace Check24Framework;


class Renderer
{
    public function render(ViewModel $viewModel)
    {
        $layoutTemplate = new ViewModel();
        $layoutTemplate->setTemplate('../template/html/layout.phtml');
        $layoutTemplate->setTemplateVariables([
            'templateOutput' => $viewModel->renderTemplate(),
            'layoutVariables' => $viewModel->getLayoutVariables()
        ]);
        echo $layoutTemplate;

    }

}