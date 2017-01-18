<?php


// Singleton (одиночка)
class SmallORM
{
    private static $instance;

    private $pdo;

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function connect($dsn, $username, $password)
    {
        $this->pdo = new \PDO($dsn, $username, $password);
    }

    public function getProductById($id)
    {

    }
}

$orm = SmallORM::getInstance();
$orm->connect("mysql:host=127.0.0.1;dbname=testdb", "root", "123");
$product = $orm->getProductById(1);


$orm = SmallORM::getInstance();
$produtct = $orm->getProductById(5);