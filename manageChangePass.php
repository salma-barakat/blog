<?php
session_start();
if(empty($_SESSION["logged"])){
    header("location:unauthenticated.php");
}
require_once('navbar.php');
require_once('User.php');
$user = unserialize($_SESSION["logged"]);
$oldPass = md5($_POST["oldPassword"]);
$newPass = md5($_POST["newPassword"]);
$changed = $user->changePass($user->id, $oldPass, $newPass);
if($changed){
    header("location:profile.php?msg=changed");
}
else{
    header("location:profile.php");
}
