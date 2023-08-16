<?php
session_start();
require_once('admin.php');
$userId = $_GET["id"];
$admin = unserialize($_SESSION["admin"]);
$admin->deleteUser($userId);