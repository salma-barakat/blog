<?php
session_start();
require_once('User.php');
$postID = $_GET["id"];
$User->deleteArticle($postID);
