<?php
namespace Check24Framework;


class Template
{
    public function __construct(ViewModel $viewModel)
    {
        $templateOutput  = $viewModel->loadTemplate();
        include('../template/html/layout.phtml');
    }


}