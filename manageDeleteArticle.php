<?php
session_start();
require_once('User.php');
require_once('admin.php');
$postID = $_GET["id"];
if (!empty($_SESSION["logged"])) {
    $user = unserialize($_SESSION["logged"]);
} 
else {
    $user = unserialize($_SESSION["admin"]);
}
$user->deleteArticle($postID);
header("location:home.php?msg=deleted");
