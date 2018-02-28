<?php
namespace Check24Framework;


class Renderer
{
    public function render(ViewModel $viewModel)
    {
        $layoutTemplate = new ViewModel();
        $layoutTemplate->setTemplate('../template/html/layout.phtml');
        $layoutTemplate->setTemplateVariables(['templateOutput'=>$viewModel->renderTemplate()]);
        echo $layoutTemplate;

    }

    //todo: fehler behandeln


}