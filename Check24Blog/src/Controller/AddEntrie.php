<?php

namespace Controller;

use Check24Framework\ControllerInterface;
use Check24Framework\ViewModel;
use Check24Framework\Request;

class AddEntrie implements ControllerInterface
{
    /**
     * @param Request $request
     * @return ViewModel
     */
    public function action(Request $request, \PDO $pdo): viewModel
    {
        $viewModel = new ViewModel();
        $viewModel->setTemplate('../template/start/eintrag.phtml');

        $stmt = $pdo->prepare("INSERT INTO entrie(date,titel,content,author) VALUES(:date,:titel,:content,:authorID)");

       if($request->getFromPost('absenden')){
           $date =date('Y-m-d H:i:s');
           $titel = $request->getFromPost('titel');
           $content = $request->getFromPost('content');
           $authorID = $_SESSION['ID'];

           $stmt->bindParam(':date',$date);
           $stmt->bindParam(':titel',$titel);
           $stmt->bindParam(':content',$content);
           $stmt->bindParam(':authorID',$authorID);

           $stmt->execute();
       }

        return $viewModel;
    }
}