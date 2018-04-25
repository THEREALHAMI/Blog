<?php

namespace Repository;

class Comment
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function addToDatabase(\Entity\Comment $comment)
    {
        $stmt = $this->pdo->prepare("INSERT INTO comment(name,mail,url,content,entrieid) VALUES(:name,:mail,:url,:bemerkung,:id)");

        $stmt->bindValue(':name',$comment->getName());
        $stmt->bindValue(':mail',$comment->getMail());
        $stmt->bindValue(':url',$comment->getUrl());
        $stmt->bindValue(':bemerkung',$comment->getContent());
        $stmt->bindValue(':id',$comment->getId());

        $stmt->execute();
    }

    /**
     * @param $blogId
     * @return array
     */
    public function getCommentByBlogId($blogId): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM comment WHERE entrieid = :blogID");
        $stmt->bindParam(':blogID', $blogId);
        $stmt->execute();

        $commentData =  $stmt->fetchAll($this->pdo::FETCH_CLASS, '\Entity\Comment');

        return $commentData;
    }

}