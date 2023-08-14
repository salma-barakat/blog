<?php
session_start();
require_once('User.php');
$commentContent = htmlspecialchars($_POST["commentContent"]);
$articleID = $_GET["article"];
$user = unserialize($_SESSION["logged"]);
$userCommented = $user->id; 
$user->addComment($articleID, $commentContent, $userCommented);