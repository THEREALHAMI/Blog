<?php

namespace Repository;

class Entry
{
    private $pdo;
    private $entryById = [];

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
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

        $stmt->bindParam(':limit', $limit, $this->pdo::PARAM_INT);
        $stmt->execute();

        $entryData = $stmt->fetchAll($this->pdo::FETCH_CLASS, '\Entity\Entry');
        return $entryData;
    }

    /**
     * @return mixed
     */
    public function getCountEntries()
    {
        $stmt = $this->pdo->query("SELECT count(ID) AS entryCount FROM entrie");
        $rowCount = $stmt->fetch();
        return $rowCount;
    }

    public function addToDatabase(\Entity\Entry $entry)
    {
        $stmt = $this->pdo->prepare("INSERT INTO entrie(date,titel,content,author) VALUES(:date,:titel,:content,:authorID)");
        $stmt->bindValue(':date', $entry->getDate());
        $stmt->bindValue(':titel', $entry->getTitel());
        $stmt->bindValue(':content', $entry->getContent());
        $stmt->bindValue(':authorID', $entry->getAuthor());
        $stmt->execute();

    }

    /**
     * @param $id
     * @return \Entity\Entry
     */
    public function getEntryById($id): \Entity\Entry
    {

        $stmtEntry = $this->pdo->prepare("SELECT entrie.*, userdata.loginname AS author
           FROM entrie
           LEFT JOIN userdata ON (entrie.author = userdata.ID)
           WHERE entrie.ID =:id"
        );
        $stmtEntry->bindParam(':id', $id);
        $stmtEntry->execute();
        $this->entryById = $stmtEntry->fetchObject('\Entity\Entry');

        $stmtComment = $this->pdo->prepare("SELECT * FROM comment WHERE entrieid = :ID");
        $stmtComment->bindParam(':ID', $id);
        $stmtComment->execute();
        $comments = $stmtComment->fetchAll($this->pdo::FETCH_CLASS, '\Entity\Comment');

        $this->entryById->setComments($comments);

        return $this->entryById;
    }

}