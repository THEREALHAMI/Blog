<?php
// TEXT ohne leerzeichen  = FEHLER
namespace Controller;

use Check24Framework\ControllerInterface;
use Check24Framework\Request;
use Check24Framework\ViewModel;


class Detail implements ControllerInterface
{
    /**
     * @param Request $request
     * @param \PDO $pdo
     * @return ViewModel
     */
    public function action(Request $request,\PDO $pdo): ViewModel
    {
        $viewModel = new ViewModel();
        $viewModel->setTemplate('../template/start/detailseite.phtml');

        $stmt = $pdo->prepare("SELECT entrie.*, userdata.loginname AS author
            FROM entrie 
            LEFT JOIN userdata ON (entrie.author = userdata.ID) 
            WHERE entrie.ID = :blogID");


        $blogID = $request->getFromQuery('ID');
        $stmt->bindParam(':blogID',$blogID);
        $stmt->execute();
        $entrieData = $stmt->fetchAll();

        $stmt= $pdo->prepare("SELECT * FROM comment WHERE entrieid = :blogID");
        $stmt->bindParam(':blogID',$blogID);
        $stmt->execute();
        $commentData = $stmt->fetchAll();

            $viewModel->setTemplateVariables([
                'title' => $entrieData[0]['titel'],
                'date' => $entrieData[0]['date'],
                'text' => $entrieData[0]['content'],
                'author' => $entrieData[0]['author'],
                'commentData' => $commentData,
                'count' => count($commentData),
                'ID' => $blogID
            ]);
        return $viewModel;
    }
}