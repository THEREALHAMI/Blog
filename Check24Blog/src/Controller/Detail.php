<?php


namespace Controller;

use Check24Framework\ControllerInterface;
use Check24Framework\Request;
use Check24Framework\ViewModel;

class Detail implements ControllerInterface
{
    public function action(Request $request): ViewModel
    {
        $viewModel = new ViewModel();
        $viewModel->setTemplate('../template/start/detailseite.phtml');

        if ($request->getFromPost('Weiterlesen')) {
            $viewModel->setTemplateVariables(['output'=>['title' => " INKS",
                'date'=>'07.03.2018',
                'text' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.',
                'author'=> 'Hans Meier'],

                'comments'=>['name'=>'Max Musterman',
                'Datum und Uhrzeit'=>'07.03.2018 um 13.14',
                'text'=>'Ich denke der Eintrag ist sehr gut, weiter so !']]);

        }
        return $viewModel;
    }
}