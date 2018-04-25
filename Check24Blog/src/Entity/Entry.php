<?php

namespace Entity;


class Entry
{
    private $ID = 0;
    private $date = '';
    private $titel = '';
    private $content = '';
    private $commentCount = 0;
    private $author = 0;
    private $comments = [];

    /**
     * @param int $author
     * @return $this
     */
    public function setAuthor(int $author)
    {
        $this->author = $author;
        return $this;
    }

    /**
     * @param string $date
     * @return $this
     */
    public function setDate(string $date)
    {
        $this->date = $date;
        return $this;
    }
    /**
     * @param array $comments
     * @return Entry
     */
    public function setComments(array $comments): Entry
    {
        $this->comments = $comments;
        return $this;
    }
    /**
     * @return array
     */
    public function getComments(): array
    {
        return $this->comments;
    }
    /**
     * @return int
     */
    public function getCommentCount(): int
    {
        return $this->commentCount;
    }
    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @return null
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->ID;
    }

    /**
     * @param int $id
     * @return Entry
     */
    public function setId(int $id): Entry
    {
        $this->ID = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitel(): string
    {
        return $this->titel;
    }

    /**
     * @param string $titel
     * @return Entry
     */
    public function setTitel(string $titel): Entry
    {
        $this->titel = $titel;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return Entry
     */
    public function setContent(string $content): Entry
    {
        $this->content = $content;
        return $this;
    }

}