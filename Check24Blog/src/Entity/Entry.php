<?php
/**
 * Created by PhpStorm.
 * User: hami.yildiz
 * Date: 26.03.2018
 * Time: 15:13
 */

namespace Entity;


class Entry
{
    private $id = 0;
    private $date = '';
    private $titel = '';
    private $content = '';
    private $authorId = 0;

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @return int
     */
    public function getAuthorId(): int
    {
        return $this->authorId;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Entry
     */
    public function setId(int $id): Entry
    {
        $this->id = $id;
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