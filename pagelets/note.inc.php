<?php
// PHP Script 1.0 - note.inc.php
// Created March 31, 2013
// Created by Valery Y. Samovich
// Display the full note

// error_reporting(E_ALL);
// print_r($_POST);

// Notes table
$query = "SELECT notename, note FROM notestbl WHERE noteid = '$row[noteid]' AND userid = '$_SESSION[userid]'"; // Set the Query
$result = mysqli_query($dbc, $query) OR die("Error: " . mysqli_error($dbc)); // Run the Query
	
echo "<table style='margin:auto auto 20px auto; width:750px; height:auto; font-size:14px;'>
	<caption style='text-align: center; margin-bottom: 5px;font-size:16px;'>Notes</caption>
  	<tr>
		<th style='padding:7px 0px; background-color:#CCC'>Title</th>
		<th style='padding:7px 0px; background-color:#CCC'>Note</th>
	</tr>";
while($row = mysqli_fetch_array($result)){
echo "<tr>";
echo "<td style='border:1px solid silver;text-align:center;padding:5px 5px;margin:2px;'>" . $row['notename'] . "</td>";
echo "<td style='border:1px solid silver;text-align:justify;padding: 5px 5px;margin:2px;'>" . $row['note'] . "</td>";
echo "</tr>";
}
echo "</table>"; // End of table

// Close the database connection
mysqli_close($dbc);

// Roster menu
echo '<ul>';
echo '<li class="admin-list"><a class="admin-link" href="index.php?pagelet=roster">Main menu &raquo;</a></li>';
echo '<li class="admin-list"><a class="admin-link" href="index.php?pagelet=usernotes">Notes menu &raquo;</a></li>';	
echo '</ul>';

?>