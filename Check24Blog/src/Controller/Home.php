<?php
namespace Controller;

use Check24Framework\AbstractController;
use Check24Framework\ViewModel;

class Home extends AbstractController
{

    private $repositoryEntry;

    public function __construct($repositoryEntry)
    {
        $this->repositoryEntry = $repositoryEntry;
    }

    /**
     * @param \Check24Framework\Request $request
     * @return ViewModel
     */
    public function action($request):ViewModel
    {

        $currentpage = $request->getfromquery('page') ? $request->getfromquery('page') : 0;
        $nextpage = $currentpage + 1;
        $limit = $currentpage * 3;

        $entry = $this->repositoryEntry;
        $entrydata = $entry->getfromdatabase($limit);
        $countentries = $entry->getcountentries();
        $lastpage = ceil(($countentries[0] / 3));

        $viewModel = new ViewModel();
        $viewModel->settemplate('../template/start/startseite.phtml');
        $viewModel->settemplatevariables([
            'blogEntries' => $entrydata,
            'currentpage' => $currentpage,
            'nextPage' => $nextpage,
            'lastPage' => $lastpage
        ]);
        $viewModel->setLayoutVariables(['asdf' => 'was geht mit dir']);

        return $viewModel;
    }
}