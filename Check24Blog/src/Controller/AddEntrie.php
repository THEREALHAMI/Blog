<?php

namespace Controller;

use Check24Framework\ControllerInterface;
use Check24Framework\ViewModel;
use Check24Framework\Request;
use  factory\Entry;

class AddEntrie implements ControllerInterface
{
    /**
     * @param Request $request
     * @return ViewModel
     */
    public function action(Request $request): viewModel
    {
       if($request->getFromPost('absenden')){
           $date =date('Y-m-d H:i:s');
           $titel = $request->getFromPost('titel');
           $content = $request->getFromPost('content');
           $authorId = $_SESSION['ID'];

           $entry = Entry::create();
           $entry->addToDatabase($date,$titel,$content,$authorId);
       }
        $viewModel = new ViewModel();
        $viewModel->setTemplate('../template/start/eintrag.phtml');

        return $viewModel;
    }
}