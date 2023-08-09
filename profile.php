<?php
session_start();
if(empty($_SESSION["logged"])){
    header("location:unauthenticated.php");
}
require_once('navbar.php');
echo "welcome";
?>
