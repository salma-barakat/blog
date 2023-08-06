<?php
require_once('User.php');
// $user = new User();
if(!empty($_POST["email"]) && !empty($_POST["password"])){
    $email = htmlspecialchars(trim($_POST["email"]));
    $password = $_POST["password"];
    User::logIn($email, md5($password));
}
else{
    // empty field
    header("location:userLogIn.php?msg=emptyField");
}