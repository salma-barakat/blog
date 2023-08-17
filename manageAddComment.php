<?php
session_start();
require_once('User.php');
require_once('admin.php');
$commentContent = htmlspecialchars($_POST["commentContent"]);
$articleID = $_GET["article"];
if (!empty($_SESSION["logged"])) {
    $user = unserialize($_SESSION["logged"]);
} 
else {
    $user = unserialize($_SESSION["admin"]);
}
$userCommented = $user->id; 
$user->addComment($articleID, $commentContent, $userCommented);