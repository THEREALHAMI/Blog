<?php


namespace Controller;

use Check24Framework\ControllerInterface;
use Check24Framework\Request;
use factory\Comment;

class AddComment implements ControllerInterface
{
    public function action(Request $request)
    {

        $name= $request->getFromPost('name');
        $mail = $request->getFromPost('mail');
        $url = $request->getFromPost('url');
        $bemerkung = $request->getFromPost('bemerkung');
        $ID =$request->getFromQuery('ID');

        $comment = Comment::create();
        $comment->addToDatabase($name,$mail,$url,$bemerkung,$ID);

        header("location:/detail?ID=".$ID,true,301);
    }
}