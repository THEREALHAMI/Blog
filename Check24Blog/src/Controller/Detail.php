<?php
// mehr trennung
//sql injektion
//htmlentities
//escape
//nextpage kramm
//timestamp) funktion
//joins joins joins joins
//exprecion
//PDO statement
// TEXT ohne leerzeichen  = FEHLER
namespace Controller;

use Check24Framework\ControllerInterface;
use Check24Framework\Request;
use Check24Framework\ViewModel;


class Detail implements ControllerInterface
{
    /**
     * @param Request $request
     * @return ViewModel
     */
    public function action(Request $request): ViewModel
    {
        $viewModel = new ViewModel();
        $viewModel->setTemplate('../template/start/detailseite.phtml');
        $mysql = new \mysqli('localhost', 'root', '', 'blog');

        $blogID = $request->getFromQuery('ID');

        $entrie = "SELECT entrie.*, userdata.loginname AS author
            FROM entrie 
            LEFT JOIN userdata ON (entrie.author = userdata.ID) 
            WHERE entrie.ID = '$blogID'";
        $query = $mysql->query($entrie);
        $entrieData = $query->fetch_all(MYSQLI_ASSOC);

        $comment = "SELECT * FROM comment WHERE entrieid = '$blogID'";
        $query = $mysql->query($comment);
        $commentData = $query->fetch_all(MYSQLI_ASSOC);

        if ($request->getFromQuery('ID')) {
            $viewModel->setTemplateVariables([
                'title' => $entrieData[0]['titel'],
                'date' => $entrieData[0]['date'],
                'text' => $entrieData[0]['content'],
                'author' => $entrieData[0]['author'],
                'commentData' => $commentData,
                'count' => count($commentData)

            ]);
        }
        if ($request->getFromPost('newComment')) {
            $name = $request->getFromPost('name');
            $mail = $request->getFromPost('mail');
            $url = $request->getFromPost('url');
            $bemerkung = $request->getFromPost('bemerkung');
            header('location:/addComment?ID=' . $blogID . '&name=' . $name . '&mail=' . $mail . '&url=' . $url . '&bemerkung=' . $bemerkung,
                true, 301);
        }
        return $viewModel;
    }
}