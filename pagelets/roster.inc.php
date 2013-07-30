<!--Content element-->
<div id='content'>
<?php
// PHP Script 1.0 - roster.inc.php
// Created March 31, 2013
// Created by Valery Y. Samovich
// Roster script

// error_reporting(E_ALL);
// print_r($_POST);

if ($_SESSION['userid'] != ''){
	
	echo '<ul>';
	echo '<li class="admin-list"><a class="admin-link" href="index.php?pagelet=usercontacts">View Contacts &raquo;</a></li>';
	echo '<li class="admin-list"><a class="admin-link" href="index.php?pagelet=usernotes">View Notes &raquo;</a></li>';
	echo '</ul>';
} else {
    echo "<p style='text-align:center;font-family:Arial;'>Please Sign in or Register to view a roster directory!</p>";
}
	// Close the database connection
	mysqli_close($dbc);

?>
</div>
<!--End of Content-->