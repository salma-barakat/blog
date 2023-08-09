<?php
session_start();
require_once('User.php');
$postId = $_GET["id"];
$user = unserialize($_SESSION["logged"]);
if(!empty($_GET["title"])){
    $updatedTitle = $_GET["title"];
    $user->updateTitle($postId, $updatedTitle);
}
if(!empty($_GET["content"])){
    $updatedContent = $_GET["content"];
    $user->updateContent($postId, $updatedContent);
}