<?php
if(!empty($_POST["email"]) && !empty($_POST["password"])){
    // if(strlen($_POST["password"])>=8){
    //    header("location:profile.php");
    // }
    // else{
    //     // password should be at least 8 characters long
    //     header("location:index.php?msg=shortPass");
    // }
    $email = htmlspecialchars(trim($_POST["email"]));
    $password = md5($_POST["password"]);
}
else{
    // empty field
    header("location:index.php?msg=emptyField");
}