<?php
require_once('User.php');
if(!empty($_POST["email"]) 
&& !empty($_POST["password"])
&& !empty($_POST["Cpassword"])
&& !empty($_POST["Fname"])
&& !empty($_POST["Lname"])
){
    if(strlen($_POST["password"])>=6){
        if($_POST["password"] == $_POST["Cpassword"]){
            $email = htmlspecialchars(trim($_POST["email"]));
            $Fname = htmlspecialchars($_POST["Fname"]);
            $Lname = htmlspecialchars($_POST["Lname"]);
            $password = $_POST["password"];  
            User::signUp($email, $Fname, $Lname, md5($password));
        }
        else{
            header("location:signUp.php?msg=unmatched");
        }
    }
    else{
        // password should be at least 8 characters long
        header("location:signUp.php?msg=shortPass");
    }
}
else{
    // empty field
    header("location:signUp.php?msg=emptyField");
}