<?php


namespace Controller;

use Check24Framework\AbstractController;
use Check24Framework\Request;
use Entity\Comment;

class AddComment extends AbstractController
{
    private $comment;
    public function __construct( $comment)
    {
        $this->comment = $comment;
    }
    public function action(Request $request)
    {
        $comment = new Comment();
        $comment->setName($request->getFromPost('name'));
        $comment->setMail( $request->getFromPost('mail'));
        $comment->setUrl($request->getFromPost('url'));
        $comment->setContent($request->getFromPost('bemerkung'));
        $comment->setId($request->getFromQuery('ID'));

        $this->comment->addToDatabase($comment);

        $this->redirectToRoute("location:/detail?ID=".$comment->getId());
    }
}