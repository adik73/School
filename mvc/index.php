<?php

class Model
{
    public function sum($x, $y)
    {
        return $x + $y;
    }

    public function multipl2($result)
    {
        return $result * 2;
    }
}

class View
{
    public function showResult($result)
    {
        echo "<b>Result:</b> " . $result . " !<br />";
    }

    public function showResultInIPhone($result)
    {
        echo "<p>iResult: </p>" . $result . "<br />";
    }

    public function justShow()
    {
        echo "HELLO!!!";
    }

    public function show404()
    {
        echo "Error 404 Page Not Found!";
    }
}

class SomeController
{
    public function foo()
    {
        $v = new View();
        $v->justShow();
    }
}

class DoingController
{
    public function doing()
    {
        $m = new Model();
        $v = new View();

        $result = $m->sum(5, 10);
        $result = $m->multipl2($result);

        $v->showResult($result);
    }

    public function justShowHello()
    {
        $v = new View();
        $v->justShow();
    }
}

class ErrorController
{
    public function action404()
    {
        $v = new View();
        $v->show404();
    }
}


if ($_SERVER["method"] == "HEAD") die();


$controllerName = $_GET["controller"];

if (class_exists($controllerName) == false) {
    $con = new ErrorController();
    $con->action404();
    die();
}

$actionName = $_GET["action"];

$c = new $controllerName();

if (method_exists($c, $actionName) == false) {
    $con = new ErrorController();
    $con->action404();
    die();
}

$c->$actionName();