<?php
/**
 * Created by PhpStorm.
 * User: hami.yildiz
 * Date: 05.04.2018
 * Time: 10:22
 */

namespace Repository;

class Comment
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function addToDatabase($name,$mail,$url,$bemerkung,$ID)
    {
        $stmt = $this->pdo->prepare("INSERT INTO comment(name,mail,url,content,entrieid) VALUES(:name,:mail,:url,:bemerkung,:id)");

        $stmt->bindParam(':name',$name);
        $stmt->bindParam(':mail',$mail);
        $stmt->bindParam(':url',$url);
        $stmt->bindParam(':bemerkung',$bemerkung);
        $stmt->bindParam(':id',$ID);

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
        $commentData = $stmt->fetchAll();
        return $commentData;
    }

}