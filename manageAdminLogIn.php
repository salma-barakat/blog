<?php
session_start();
require_once('admin.php');
if(!empty($_POST["email"]) && !empty($_POST["password"])){
    $email = htmlspecialchars(trim($_POST["email"]));
    $password = $_POST["password"];
    $admin = Admin::logIn($email, md5($password));
    if($admin != null){
        $_SESSION["admin"] = serialize($admin);
        header("location:adminHome.php");
    }
}
else{
    // empty field
    header("location:adminLogIn.php?msg=emptyField");
}