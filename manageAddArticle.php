<?php
session_start();
require_once('User.php');
if(!empty($_POST["title"]) && !empty($_POST["articleContent"])){
    $file_name = null;
    $user = unserialize($_SESSION["logged"]);
    var_dump($user);
    $title = htmlspecialchars($_POST["title"]);
    $content = htmlspecialchars(trim($_POST["articleContent"]));
    $file_extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
    $file_name = "images/posts/".date("YmdHis").".".$file_extension; //set image with date(seconds) as name
    move_uploaded_file($_FILES["image"]["tmp_name"], $file_name);
    if ($_FILES["image"]["error"] > 0) {
        echo "File upload error: " . $_FILES["image"]["error"];
        exit;
    }
    $user->addArticle($title, $content, $file_name, $user->id);
}
else{
    header("location:home.php?msg=emptyField");
}
