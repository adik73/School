<?php

class Model
{
    public function sum($x, $y){
        return $x + $y;
    }
}

class  Viev
{
    public function showResult($result)
    {
        echo "<b>Result:</b>" . $result . "!<br />";
    }
}

class Controller
{
    public function doing;
    {
        $m = new Model();
        $v = new Viev();

        $result = $m->sum(5,10);
        $result = $m->multipl3($result);
    }
}