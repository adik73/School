<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 15.01.17
 * Time: 10:24
 */
var_dump($_FILES);

if (is_uploaded_file($_FILES["PHOTO"] ["tmp_name"]))
{
    $photoDir = __DIR__."/images/"
    $photoName = $_FILES["photo"]["name"];
    copy($_FILES["photo"]["tmp_name"]) ;

}
/*
 * git init   инициализация репозитория в проекте
 * git add ./ добавить всё в текущей директории
 * git commit -m "ваш комментарий к коммиту" сохранить состояние проекта
 *
 */