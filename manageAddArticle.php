<?php
session_start();
require_once('User.php');
require_once('Admin.php');
if(!empty($_POST["title"]) && !empty($_POST["articleContent"])){
    $file_name = null;
    if(!empty($_SESSION["logged"])){
        $user = unserialize($_SESSION["logged"]);
    }
    else{
        $user = unserialize($_SESSION["admin"]);
    }
    $title = htmlspecialchars($_POST["title"]);
    $content = htmlspecialchars(trim($_POST["articleContent"]));
    $file_name = null;
    if(!empty($_FILES["image"]["name"])){
        $file_extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
        $file_name = "images/posts/".date("YmdHis").".".$file_extension;
        move_uploaded_file($_FILES["image"]["tmp_name"],$file_name);
    }
    $user->addArticle($title, $content, $file_name, $user->id);
    header("location:home.php?msg=added");
}
else{
    header("location:home.php?msg=emptyField");
}
