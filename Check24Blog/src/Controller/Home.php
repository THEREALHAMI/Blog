<?php

namespace Controller;

use \Check24Framework\ControllerInterface;
use Check24Framework\ViewModel;

class Home implements ControllerInterface
{
    public function action($request): viewModel
    {
        $mysql = new \mysqli('localhost', 'root', '', 'blog');
        $entrie = "SELECT *  FROM entrie ";
        $query = $mysql->query($entrie);
        $blogData = $query->fetch_all(MYSQLI_ASSOC);

        foreach ($blogData as $i => $blogEntry) {
            if ($user = $mysql->query("SELECT * FROM userdata WHERE  ID = '$blogEntry[author]'")){
                $blogData[$i]['author'] = $user->fetch_assoc()['LoginName'];
                var_dump($blogEntry['author']);
            }
        }
        $viewModel = new ViewModel();
        $viewModel->setTemplate('../template/start/startseite.phtml');
        $viewModel->setTemplateVariables([
            'blogEntries' => $blogData
        ]);


        return $viewModel;
    }
}