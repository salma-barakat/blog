<?php
session_start();
require_once('User.php');
require_once('Admin.php');
$postId = $_GET["id"];
if(!empty($_SESSION["logged"])){
    $user = unserialize($_SESSION["logged"]);
}
else{
    $user = unserialize($_SESSION["admin"]);
}
if(!empty($_GET["title"])){
    $updatedTitle = $_GET["title"];
    $user->updateTitle($postId, $updatedTitle);
}
if(!empty($_GET["content"])){
    $updatedContent = $_GET["content"];
    $user->updateContent($postId, $updatedContent);
}