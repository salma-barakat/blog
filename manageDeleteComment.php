<?php
session_start();
require_once('User.php');
$commentID = $_GET["id"];
$postID = $_GET["post"];
var_dump($postID);
$user = unserialize($_SESSION["logged"]);
$user->deleteComment($commentID, $postID);