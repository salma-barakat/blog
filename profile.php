<?php
session_start();
if(empty($_SESSION["logged"])){
    header("location:unauthenticated.php");
}
echo "welcome";
?>
