<!--Content element-->
<div id='content'>
<?php
// PHP Script 1.0 - roster.inc.php
// Created March 31, 2013
// Created by Valery Y. Samovich
// Roster script

// error_reporting(E_ALL);
// print_r($_POST);

// Notes table

	$query  = "SELECT notename, note FROM notestbl WHERE userid = '$_SESSION[userid]'"; // Define the query
	$result = mysqli_query($dbc, $query) OR die("Error: " . mysqli_error($dbc)); // Run the Query
	
	echo "<table style='margin:auto auto 20px auto; width:750px; height:auto; font-size:14px;'>
			<caption style='text-align:center; margin-bottom:5px; font-size:16px;'>Notes</caption>
			<tr>
			<th style='padding:7px 0px; background-color:#CCC;width:140px;'>Title</th>
			<th style='padding:7px 0px; background-color:#CCC'>Note</th>
			</tr>";
	
	while($row = mysqli_fetch_array($result)){
  	echo "<tr>";
	echo "<td style='border:1px solid silver;text-align:center;padding:5px 5px;margin:2px;'>" . $row['notename'] . "</td>";
	$content = $row['note'];
	$first = substr($content,0,70);
	$second = substr($content,70);
	echo "<td style='border:1px solid silver;text-align:justify;padding: 5px 5px;margin:2px;'>" . $first . "...<a href='index.php?pagelet=note&id={$row['noteid']} style='text-decoration:none;color:rgb(48, 152, 242);'>read more</a></td>";
	echo "</tr>";
  	}
	echo "</table>"; // End of notes table

	// Roster menu for notes
	echo '<ul>';
	echo '<li class="admin-list"><a class="admin-link" href="index.php?pagelet=addnote">Add note &raquo;</a></li>';
	echo '<li class="admin-list"><a class="admin-link" href="index.php?pagelet=editnote">Edit note &raquo;</a></li>';
	echo '<li class="admin-list"><a class="admin-link" href="index.php?pagelet=deletenote">Delete note &raquo;</a></li>';
	echo '<li class="admin-list"><a class="admin-link" href="index.php?pagelet=roster">Main menu &raquo;</a></li>';		
	echo '</ul>';
?>
</div>
<!--End of Content-->