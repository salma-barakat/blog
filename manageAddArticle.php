<?php
session_start();
require_once('User.php');
if(!empty($_POST["title"]) && !empty($_POST["articleContent"])){
    $file_name = null;
    $user = unserialize($_SESSION["logged"]);
    var_dump($user);
    $title = htmlspecialchars($_POST["title"]);
    $content = htmlspecialchars(trim($_POST["articleContent"]));
    if(!empty($_FILES["img"]["name"])){
        $file_extension = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
        $file_name = "imgs/posts/".date("YmdHis").".".$file_extension; //set img with date(seconds) as name
        move_uploaded_file($_FILES["img"]["tmp_name"], $file_name);
    }
    var_dump($user->id);
    $user->addArticle($title, $content, $file_name, $user->id);
}
else{
    header("location:home.php?msg=emptyField");
}
