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
            function signUp(){
                require_once('configurations.php');
                $email = htmlspecialchars(trim($_POST["email"]));
                $connection = mysqli_connect(DB_USER_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
                $qryEmailExists = "SELECT * FROM users WHERE email = '$email'";
                $resEmailExists = mysqli_query($connection, $qryEmailExists);
                if(mysqli_num_rows($resEmailExists)>0){
                    header("location:signUp.php?msg=emailExists");
                }
                else{
                    $Fname = htmlspecialchars($_POST["Fname"]);
                    $Lname = htmlspecialchars($_POST["Lname"]);
                    var_dump($_POST["password"]);
                    $password = md5($_POST["password"]);  
                    var_dump($password);  
                    $query = "INSERT INTO users (Fname, Lname, email, password, registeredTime) VALUES('$Fname', '$Lname', '$email', $password, now())";
                    $result = mysqli_query($connection, $query); 
                    // header("location:home.php");
                }
            }
            signUp();
        }
        else{
            header("location:signUp.php?msg=unmatched");
        }
    }
    else{
        // password should be at least 8 characters long
        header("location:signUp.php?msg=shortPass");
    }
    // $email = htmlspecialchars(trim($_POST["email"]));
    // $password = md5($_POST["password"]);
}
else{
    // empty field
    header("location:signUp.php?msg=emptyField");
}