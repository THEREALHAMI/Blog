<?php


namespace Controller;

use Check24Framework\ControllerInterface;
use Check24Framework\Request;

class AddComment implements ControllerInterface
{
    public function action(Request $request)
    {
        $mysql = new \mysqli('localhost', 'root', '', 'blog');
        $name = $request->getFromQuery('name');
        $mail = $request->getFromQuery('mail');
        $url = $request->getFromQuery('url');
        $bemerkung = $request->getFromQuery('bemerkung');
        $ID = $request->getFromQuery('ID');
        $query  =$mysql->query("INSERT INTO comment(name,mail,url,content,entrieid) VALUES('$name','$mail','$url','$bemerkung',$ID)");
        $escaping = \mysqli_real_escape_string($query);
        header("location:/detail?ID=".$ID,true,301);
    }
}