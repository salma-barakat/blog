<?php
session_start();
require_once('User.php');
require_once('admin.php');
$commentID = $_GET["id"];
$postID = $_GET["post"];
if (!empty($_SESSION["logged"])) {
    $user = unserialize($_SESSION["logged"]);
} 
else {
    $user = unserialize($_SESSION["admin"]);
}
$user->deleteComment($commentID, $postID);