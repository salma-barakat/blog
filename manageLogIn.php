<?php
if(!empty($_POST["email"]) && !empty($_POST["password"])){
       header("location:home.php");
    $email = htmlspecialchars(trim($_POST["email"]));
    $password = md5($_POST["password"]);
}
else{
    // empty field
    header("location:index.php?msg=emptyField");
}