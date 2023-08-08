<?php
session_start();
require_once('User.php');
if(!empty($_POST["title"]) && !empty($_POST["articleContent"])){
    $file_name = null;
    $user = unserialize($_SESSION["logged"]);
    $title = htmlspecialchars($_POST["title"]);
    $content = htmlspecialchars(trim($_POST["articleContent"]));
    $file_name = null;
    if(!empty($_FILES["image"]["name"])){
        $file_extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
        $file_name = "images/posts/".date("YmdHis").".".$file_extension;
        move_uploaded_file($_FILES["image"]["tmp_name"],$file_name);
    }
    $user->addArticle($title, $content, $file_name, $user->id);
}
else{
    header("location:home.php?msg=emptyField");
}
