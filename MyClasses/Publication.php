<?php

namespace MyClasses;

class Publication extends BaseArticle
{
    private $authorName;

    public function setAuthor($author)
    {
        $this->authorName = $author;
    }

    public function getAuthor()
    {
        return $this->authorName;
    }

    public function showTitle($titleColor)
    {
        echo "<b style='color: ".$titleColor."'>TITLE PUBLICATION: </b> " . $this->title . "<br />";
    }

    public function show()
    {
        parent::show();
        echo "Author name: " . $this->getAuthor() . "<br />";
    }

    public function showAll()
    {
        $this->show();
    }
}