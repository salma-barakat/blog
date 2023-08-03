<?php
session_start();
if(!empty($_POST["email"]) 
&& !empty($_POST["password"])
&& !empty($_POST["Cpassword"])
&& !empty($_POST["Fname"])
&& !empty($_POST["Lname"])
){
    if(strlen($_POST["password"])>=6){
        if($_POST["password"] == $_POST["Cpassword"]){
            function login(){
                $email = $_POST["email"];
                $Fname = $_POST["Fname"];
                $Lname = $_POST["Lname"];
                $password = $_POST["password"];
                $query = "INSERT INTO users (Fname, Lname, email, password, registeredTime) VALUES('$Fname', '$Lname', '$email', '$password', now())";
                require_once('configurations.php');
                $connection = mysqli_connect(DB_NAME, DB_USER_NAME, DB_USER_PASSWORD, DB_HOST);
            }
            header("location:home.php");
        }
        else{
            header("location:signUp.php?msg=unmatched");
        }
    }
    else{
        // password should be at least 8 characters long
        header("location:signUp.php?msg=shortPass");
    }
    $email = htmlspecialchars(trim($_POST["email"]));
    $password = md5($_POST["password"]);
}
else{
    // empty field
    header("location:signUp.php?msg=emptyField");
}