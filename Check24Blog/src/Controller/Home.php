<?php
//dependence injektion über Konstruker, set und getter
//alles in ein Array bindPara funktion dafür suchen
// ? als Platzhalter benutzen
//factory pattern
//factor erstellt Objekte
//factory = konfiguration
//Ordner für Repositorys
//anpassen der funktionen
//alles was mit datenbanken zu tun hatt verschieben nur repositiry
//erzeugen über factory
//im ordner factory / factory interafce  mit create funktion
//§ factory erstellen objekt und dependence injektion
//factory für PDO objekt
//interface konfiguration und dependence können
//konfig anpassen

namespace Controller;

use \Check24Framework\ControllerInterface;
use Check24Framework\ViewModel;

class Home implements ControllerInterface
{

    /**
     * @param \Check24Framework\Request $request
     * @return ViewModel
     */
    public function action($request, \PDO $pdo): viewModel
    {

        $currentPage = $request->getFromQuery('page') ? $request->getFromQuery('page') : 0;
        $nextPage = $currentPage + 1;
        $limit = $currentPage * 3;

        $stmt = $pdo->prepare("SELECT entrie.*, if(comment.entrieid IS NOT NULL, count(*),0) as commentCount, userdata.loginname AS author
        FROM `entrie`
        LEFT JOIN comment ON ( entrie.ID = comment.entrieid)
        LEFT JOIN userdata ON (entrie.author = userdata.ID)
        GROUP BY entrie.ID
        ORDER BY date DESC
        LIMIT :limit, 3");

        $stmt->bindParam(':limit', $limit, \PDO::PARAM_INT);
        $stmt->execute();
        $entrieData = $stmt->fetchAll();

        $stmt = $pdo->prepare("SELECT count(ID) FROM entrie ");
        $stmt->execute();
        $countNumber = $stmt->fetchAll();

        $lastPage = ceil(($countNumber[0]['count(ID)']) / 3);


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