<?php
// PHP Script 1.0 - dbconnect.php
// Created April 4, 2013
// Created by Valery Y. Samovich
// This script help to connect to MySQL database

// Set the database access information as constants
DEFINE ('DB_USER', '1255800_roster');
DEFINE ('DB_PASSWORD', 'r0st3r!');
DEFINE ('DB_HOST', 'fdb4.biz.nf');
DEFINE ('DB_NAME', '1255800_roster');
 
// Make the connection
$dbc = mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) 
       OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
?>