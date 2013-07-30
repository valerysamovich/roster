<?php
// PHP Script 1.0 - logout.inc.php
// Created March 31, 2013
// Created by Valery Y. Samovich

// error_reporting(E_ALL);
// print_r($_POST);

// Destroy session variables
$_SESSION['userid'] = 0;
$_SESSION['firstname'] = 0;  

// Destroy the session
session_destroy(); 

// Destroy the cookie
setcookie ('PHPSESSID', '', time()-300, '/', '', 0);
header("Location:  http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/index.php?pagelet=redirect");
exit();
?>