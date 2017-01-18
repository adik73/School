<?php

namespace MyClasses;

class Article extends BaseArticle
{
    public static function showCounter()
    {
        echo "Counter: " . self::$counter . "<br />";
    }

    public function showTitle($titleColor)
    {
        echo "<b style='color: ".$titleColor."'>TITLE ARTICLE: </b> " . $this->title . "<br />";
    }

    public function showAll()
    {
        $this->show();
    }
}