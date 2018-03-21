<?php

namespace Controller;

use \Check24Framework\ControllerInterface;
use Check24Framework\ViewModel;

class Home implements ControllerInterface
{
    /**
     * @param \Check24Framework\Request $request
     * @return ViewModel
     */
    public function action($request): viewModel
    {

        $currentPage = $request->getFromQuery('page') ? $request->getFromQuery('page') : 0;
        $nextPage = $currentPage + 1;
        $limit = $currentPage * 3;

        $mysql = new \mysqli('localhost', 'root', '', 'blog');
        $data = "SELECT entrie.*, if(comment.entrieid IS NOT NULL, count(*),0) as commentCount, userdata.loginname AS author
        FROM `entrie`
        LEFT JOIN comment ON ( entrie.ID = comment.entrieid)
        LEFT JOIN userdata ON (entrie.author = userdata.ID)
        GROUP BY entrie.ID
        ORDER BY date DESC
        LIMIT $limit, 3";
        $query = $mysql->query($data);
        $entrieData = $query->fetch_all(MYSQLI_ASSOC);

        $count = "SELECT count(ID) FROM entrie ";
        $query = $mysql->query($count);
        $countNumber = $query->fetch_assoc();

        $lastPage = ceil(($countNumber['count(ID)']) / 3);

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