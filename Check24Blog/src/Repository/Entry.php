<?php

namespace Repository;

class Entry
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo =  $pdo;
    }

    /**
     * @param $limit
     * @return array
     */
    public function getFromDatabase($limit): array
    {
        $stmt = $this->pdo->prepare("SELECT entrie.*, if(comment.entrieid IS NOT NULL, count(*),0) as commentCount, userdata.loginname AS author
        FROM `entrie`
        LEFT JOIN comment ON ( entrie.ID = comment.entrieid)
        LEFT JOIN userdata ON (entrie.author = userdata.ID)
        GROUP BY entrie.ID
        ORDER BY date DESC
        LIMIT :limit, 3");

        $stmt->bindParam(':limit', $limit, \PDO::PARAM_INT);
        $stmt->execute();
        $entryData = $stmt->fetchAll();
       var_dump($stmt->fetchObject('\Entity\Entry'));

        return $entryData;
    }

    /**
     * @return array
     */
    public function getCountEntries(): array
    {
        $stmt = $this->pdo->prepare("SELECT count(ID) FROM entrie ");
        $stmt->execute();
        $countEntries = $stmt->fetchAll();

        return $countEntries;
    }

    public function addToDatabase($date, $titel, $content, $authorId)
    {
        $stmt = $this->pdo->prepare("INSERT INTO entrie(date,titel,content,author) VALUES(:date,:titel,:content,:authorID)");
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':titel', $titel);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':authorID', $authorId);
        $stmt->execute();

    }

    /**
     * @param $blogId
     * @return array
     */
    public function getEntryById($blogId): array
    {
        $stmt = $this->pdo->prepare("SELECT entrie.*, userdata.loginname AS author
            FROM entrie 
            LEFT JOIN userdata ON (entrie.author = userdata.ID) 
            WHERE entrie.ID = :blogID");
        $stmt->bindParam(':blogID', $blogId);
        $stmt->execute();
        $entryData = $stmt->fetchAll();

        return $entryData;
    }
}