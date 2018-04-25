<?php
// TEXT ohne leerzeichen  = FEHLER
namespace Controller;

use Check24Framework\AbstractController;
use Check24Framework\Request;
use Check24Framework\ViewModel;

class Detail extends AbstractController
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
    public function action(Request $request): ViewModel
    {
        $viewModel = new ViewModel();
        $viewModel->setTemplate('../template/start/detailseite.phtml');

        $blogId = $request->getFromQuery('ID');


        $entryData = $this->entry->getEntryById($blogId);

            $viewModel->setTemplateVariables([
                'entryData'=> $entryData,
                'ID' => $blogId
            ]);
        return $viewModel;
    }
}