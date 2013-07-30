<?php

// Error Reporting functions
// error_reporting(E_ALL);
// print_r($_POST);

ob_start(); // Turn on output buffering
session_start(); // Start a session

//  Make sure that the pagelet variable is set with $var = 
$pagelet = (isset($_GET['pagelet']) ? $_GET['pagelet'] : "index");

require ("includes/language.inc.php"); // Constants
require ("includes/functions.inc.php"); // Functions
require ('mysql_connect.php'); // Database connection

// index.php
if (!isset($pagelet)){ $pagelet = "index"; }
   
// Pull in the page header.
include ("includes/header.inc.php");

// Pull in the page navigation.
include ("includes/navigation.inc.php");

// Pull in the page content.
echo "<p id='mainhead'>" . constant(strtoupper($pagelet) . '_TITLE') . "</p>";
include ("pagelets/$pagelet.inc.php");

// Pull in the page footer.
include ("includes/footer.inc.php");

?>