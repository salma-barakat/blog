<?php
session_start();
require_once('User.php');
// $user = new User();
if(!empty($_POST["email"]) && !empty($_POST["password"])){
    require_once('configurations.php');
    $email = htmlspecialchars(trim($_POST["email"]));
    $password = md5($_POST["password"]);
    $qryEmailExists = "SELECT * FROM users WHERE email = '$email'";
    $connection = mysqli_connect(DB_USER_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
    $resEmailExists = mysqli_query($connection, $qryEmailExists);
    if(mysqli_num_rows($resEmailExists)>0){
        $user = mysqli_fetch_assoc($resEmailExists);
        var_dump(($user["password"]));
        var_dump($password);
        if($user["password"] == md5($password)){
            $_SESSION["logged"] = serialize($user);
            header("location:home.php");
        }
        else{
            header("location:userLogIn.php?msg=wrongPass");
        }
    }
    else{
    }
}
else{
    // empty field
    header("location:index.php?msg=emptyField");
}