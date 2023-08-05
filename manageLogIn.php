<?php
session_start();
require_once('User.php');
// $user = new User();
if(!empty($_POST["email"]) && !empty($_POST["password"])){
    function logIn($email, $password){
        require_once('configurations.php');
        $qryEmailExists = "SELECT * FROM users WHERE email = '$email'";
        $connection = mysqli_connect(DB_USER_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $resEmailExists = mysqli_query($connection, $qryEmailExists);
        if(mysqli_num_rows($resEmailExists)>0){
            $user = mysqli_fetch_assoc($resEmailExists);
            var_dump(($user["password"]));
            var_dump($password);
            if($user["password"] == $password){
                $_SESSION["logged"] = $user;
                header("location:home.php");
            }
            else{
                header("location:userLogIn.php?msg=wrongPass");
            }
        }
        else{
            header("location:userLogIn.php?msg=NoEmailExist");
        }
    }
    $email = htmlspecialchars(trim($_POST["email"]));
    $password = $_POST["password"];
    logIn($email, md5($password));
}
else{
    // empty field
    header("location:userLogIn.php?msg=emptyField");
}