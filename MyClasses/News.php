<?php

namespace MyClasses;

class News extends BaseArticle implements \JsonSerializable
{
    private $short_description;

    private $status;

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    public function __construct($tit = "", $dat = "", $cont = "", $sd = "")
    {
        parent::__construct($tit, $dat, $cont);
        $this->short_description = $sd;
        $this->doShower();
    }

    public function __toString()
    {
        return "Magic method toString is running!";
    }

    public function jsonSerialize()
    {
        $ar = [
            "title" => $this->title,
            "date_published" => $this->datePublished,
            "status" => $this->status
        ];

        return $ar;
    }


    public function doShower()
    {
        $this->status = self::STATUS_ACTIVE;
    }

    public function doHidden()
    {
        $this->status = self::STATUS_INACTIVE;
    }

    public function show()
    {
        if ($this->status == self::STATUS_ACTIVE) {
            parent::show(); // полиморфизм
            echo "Short description: " . $this->short_description . "<br />";
        }
    }

    public function showTitle($titleColor)
    {
        echo "<b style='color: ".$titleColor."'>TITLE NEWS: </b> " . $this->title . "<br />";
    }

    public function getShortDescription()
    {
        return $this->short_description;
    }

    public function setShortDescription($sd)
    {
        $this->short_description = $sd;
    }

    public function showAll()
    {
        $this->show();
    }
}