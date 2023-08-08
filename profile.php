<?php
session_start();
require_once('navbar.php');
if(empty($_SESSION["logged"])){
    header("location:unauthenticated.php");
}
echo "welcome";
?>
