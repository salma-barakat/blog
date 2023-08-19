<?php
session_start();
require_once('User.php');
require_once('Admin.php');
if(!empty($_POST["email"]) && !empty($_POST["password"])){
    $email = htmlspecialchars(trim($_POST["email"]));
    $password = $_POST["password"];
    $role = $_POST["role"];
    if($role == 'user'){
        $user = User::logIn($email, md5($password));
        if($user != null){
            $_SESSION["logged"] = serialize($user);
            header("location:home.php");
        }
    }
    if($role == 'admin'){
        $admin = Admin::logIn($email, md5($password));
        if($admin != null){
            $_SESSION["admin"] = serialize($admin);
            header("location:home.php");
        }
    }
}
else{
    // empty field
    header("location:index.php?msg=emptyField");
}