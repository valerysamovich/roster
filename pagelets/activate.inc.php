<?php 
// PHP Script 1.0 - activate.inc.php
// Created March 31, 2013
// Created by Valery Y. Samovich
// Script activates the user's account.

error_reporting(E_ALL & ~E_NOTICE);
print_r($_POST);

// Create a function for escaping the data
function escape_data($data) {
	global $dbc; // Need the connection.
    if (ini_get('magic_quotes_gpc')) {
    	$data = stripslashes($data);
    }
    	return mysql_escape_string($data);
	} // End of function.

// Validate $_GET['x'] and $_GET['y'].
if (isset($_GET['x'])) {
    $x = (int) $_GET['x'];
} else {
    $x = 0;
}
if (isset($_GET['y'])) {
    $y = $_GET['y'];
} else {
    $y = 0;
}

// If $x and $y aren't correct, redirect the user.
if ( ($x > 0) && (strlen($y) == 32)) {

    $query = "UPDATE userstbl SET active=NULL WHERE (userid=$x AND active='" . escape_data($y) . "') LIMIT 1"; // Set a Query  
    $result = mysqli_query($dbc, $query) OR die("Error: " . mysqli_error($dbc)); // Run the Query
    
    // Print a customized message.
    if (mysqli_affected_rows() == 1) { //if update query was successfull
        echo "<p>Account activation complete</p><p>Your account is now active. You may now log in.</p>";
    } else {
        echo '<p class="error">Your account could not be activated. Please re-check the link or contact the system administrator.</p>'; 
    }
	
    mysqli_close($dbc);

} else { // Redirect.

    // Start defining the URL.
    $url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
    // Check for a trailing slash.
    if ((substr($url, -1) == '/') OR (substr($url, -1) == '\\') ) {
        $url = substr ($url, 0, -1); // Chop off the slash.
    }

    exit(); // Quit the script.

} // End of main IF-ELSE.
?>