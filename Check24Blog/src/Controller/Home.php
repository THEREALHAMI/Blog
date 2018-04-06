<?php
//dependence injektion über Konstruker, set und getter(auch möglich)
//todo: factory für repository erstellen, benutze Konstruker

namespace Controller;

use \Check24Framework\ControllerInterface;
use Check24Framework\ViewModel;
use factory\Entry;

class Home implements ControllerInterface
{
    /*
    private $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }*/

    /**
     * @param \Check24Framework\Request $request
     * @return ViewModel
     */
    public function action($request): viewModel
    {

        $currentPage = $request->getFromQuery('page') ? $request->getFromQuery('page') : 0;
        $nextPage = $currentPage + 1;
        $limit = $currentPage * 3;

        $entry = Entry::create();
       $entrieData = $entry->getFromDatabase($limit);
       $countEntries = $entry->getCountEntries();

        $lastPage = ceil(($countEntries[0]['count(ID)']) / 3);

        $viewModel = new ViewModel();
        $viewModel->setTemplate('../template/start/startseite.phtml');
        $viewModel->setTemplateVariables([
            'blogEntries' => $entrieData,
            'currentPage' => $currentPage,
            'nextPage' => $nextPage,
            'lastPage' => $lastPage
        ]);

        return $viewModel;
    }
}