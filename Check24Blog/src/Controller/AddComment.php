<?php


namespace Controller;

use Check24Framework\ControllerInterface;
use Check24Framework\Request;

class AddComment implements ControllerInterface
{
    public function action(Request $request, \PDO $pdo)
    {

        $stmt = $pdo->prepare("INSERT INTO comment(name,mail,url,content,entrieid) VALUES(:name,:mail,:url,:bemerkung,:id)");

        $name= $request->getFromPost('name');
        $mail = $request->getFromPost('mail');
        $url = $request->getFromPost('url');
        $bemerkung = $request->getFromPost('bemerkung');
        $ID =$request->getFromQuery('ID');

        $stmt->bindParam(':name',$name);
        $stmt->bindParam(':mail',$mail);
        $stmt->bindParam(':url',$url);
        $stmt->bindParam(':bemerkung',$bemerkung);
        $stmt->bindParam(':id',$ID);

        $stmt->execute();

        header("location:/detail?ID=".$ID,true,301);
    }
}