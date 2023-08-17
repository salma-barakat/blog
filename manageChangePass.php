<?php
session_start();
if(empty($_SESSION["logged"]) && empty($_SESSION["admin"])){
    header("location:unauthenticated.php");
}
require_once('navbar.php');
require_once('User.php');
require_once('admin.php');
if (!empty($_SESSION["logged"])) {
    $user = unserialize($_SESSION["logged"]);
}
else {
    $user = unserialize($_SESSION["admin"]);
}
$oldPass = md5($_POST["oldPassword"]);
$newPass = md5($_POST["newPassword"]);
$changed = $user->changePass($user->id, $oldPass, $newPass);
if($changed){
    header("location:changePassword.php?msg=changed");
}
else{
    header("location:changePassword.php?msg=wrongPass");
}
