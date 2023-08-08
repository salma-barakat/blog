<?php
session_start();
require_once('User.php');
// $user = new User();
if(!empty($_POST["email"]) && !empty($_POST["password"])){
    $email = htmlspecialchars(trim($_POST["email"]));
    $password = $_POST["password"];
    $user = User::logIn($email, md5($password));
    if($user != null){
        $_SESSION["logged"] = serialize($user);
        header("location:home.php");
    }
}
else{
    // empty field
    header("location:userLogIn.php?msg=emptyField");
}