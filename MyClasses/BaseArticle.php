<?php

namespace MyClasses;

abstract class BaseArticle implements IViewer
{
    /**
     * @var string
     */
    protected $title;

    /**
     * @var \DateTime
     */
    protected $datePublished;

    /**
     * @var string
     */
    protected $content;

    static $counter;

    public function __construct($tit = "", \DateTime $dat = null, $cont = "")
    {
        $this->title = $tit;
        $this->datePublished = $dat;
        $this->content = $cont;
    }
    public function show()
    {
        self::$counter++;

        echo "Title: " . $this->title . "<br />";
        echo "Date published: " . $this->datePublished->format("H:i:s d.m.Y") . "<br />";
        echo "Content: " . $this->content . "<br />";
    }

    abstract public function showTitle($titleColor);

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return \DateTime
     */
    public function getDatePublished()
    {
        return $this->datePublished;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }


}