<?php

namespace Controller;

use Check24Framework\AbstractController;
use Check24Framework\ViewModel;
use Check24Framework\Request;
use Entity\Entry;

class AddEntrie extends AbstractController
{
    private $entry;
    public function __construct($entry)
    {
        $this->entry = $entry;
    }
    /**
     * @param Request $request
     * @return ViewModel
     */
    public function action(Request $request): viewModel
    {
       if($request->getFromPost('absenden')){
           $entry = new Entry();
           $entry->setDate(date('Y-m-d H:i:s'));
           $entry->setTitel($request->getFromPost('titel'));
           $entry->setContent($request->getFromPost('content'));
           $entry->setAuthor($_SESSION['ID']);
           $this->entry->addToDatabase($entry);
       }
        $viewModel = new ViewModel();
        $viewModel->setTemplate('../template/start/eintrag.phtml');

        return $viewModel;
    }
}