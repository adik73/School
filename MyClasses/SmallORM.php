<?php

namespace MyClasses;

class SmallORM
{
    /**
     * @var \PDO
     */
    private $pdo;

    public function __construct($dsn, $username = "", $password = "")
    {
        try {
            $this->pdo = new \PDO($dsn, $username, $password);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $ex) {
            echo "<b>Database connection error</b>: " . $ex->getMessage();
        }
    }

    public function saveArticle(Article $article)
    {
        $sql = "insert into article (title, date_published, content) values (:title, :date_published, :content)";

        $sth = $this->pdo->prepare($sql);
        $title = $article->getTitle();

        $sth->bindParam(":title", $title);

        $datePub = $article->getDatePublished();
        $datePubStr = $datePub->format("Y-m-d H:i:s");
        $sth->bindParam(":date_published", $datePubStr);

        $content = $article->getContent();
        $sth->bindParam(":content", $content);

        $sth->execute();
    }

    public function getArticleById($id)
    {
        $sql = "select * from article where id = :id";

        $sth = $this->pdo->prepare($sql);
        $sth->bindParam(":id", $id, \PDO::PARAM_INT);
        $sth->execute();

        $data = $sth->fetchAll(\PDO::FETCH_ASSOC);

        $datePub = new \DateTime($data[0]["date_published"]);
        $article = new Article($data[0]["title"], $datePub, $data[0]["content"]);

        return $article;
    }

    public function getAllArticles()
    {

    }
}