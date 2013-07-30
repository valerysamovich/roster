<!--Content element-->
<div id='content'>
<?php
// PHP Script 1.0 - roster.inc.php
// Created March 31, 2013
// Created by Valery Y. Samovich
// Roster script

// error_reporting(E_ALL);
// print_r($_POST);

// Number of records to show per page:
$display = 3;

// Determine how many pages there are. 
if (isset($_GET['np'])) { // Already been determined.
    $num_pages = $_GET['np'];

} else { // Need to determine.
     // Count the number of records
    $query = "SELECT COUNT(*) FROM contactstbl ORDER BY contactid ASC";
    $result = mysqli_query ($dbc, $query);
    $row = mysqli_fetch_array ($result, MYSQL_NUM);
    $num_records = $row[0];

    // Calculate the number of pages.
    if ($num_records > $display) { // More than 1 page.
        $num_pages = ceil ($num_records/$display);
    } else {
        $num_pages = 1;
    }
    
} // End of np IF.

// Determine where in the database to start returning results.
if (isset($_GET['s'])) {
    $start = $_GET['s'];
} else {
    $start = 0;
}

// Contacts table
$query = "SELECT firstname, lastname, email FROM contactstbl WHERE userid = '$_SESSION[userid]'"; // Set the Query
$result = mysqli_query($dbc, $query) OR die("Error: " . mysqli_error($dbc)); // Run the Query
	
echo "<table style='margin:auto auto 20px auto; width:750px; height:auto; font-size:14px;'>
	<caption style='text-align: center; margin-bottom:5px; font-size:16px;'>Contacts</caption>
	<tr>
	<th style='padding:7px 0px; background-color:#CCC'>First name</th>
	<th style='padding:7px 0px; background-color:#CCC'>Last name</th>
	<th style='padding:7px 0px; background-color:#CCC'>Email</th>
	</tr>";
	
while($row = mysqli_fetch_array($result)){
	echo "<tr>";
	echo "<td style='border:1px solid silver;text-align:center;padding:5px 0px;margin:2px;'>" . $row['firstname'] . "</td>";
	echo "<td style='border:1px solid silver;text-align:center;padding:5px 0px;margin:2px;'>" . $row['lastname'] . "</td>";
	echo "<td style='border:1px solid silver;text-align:center;padding:5px 0px;margin:2px;'>" . $row['email'] . "</td>";
	echo "</tr>";
}
echo "</table>"; // End of contacts table
	
// Make the links to other pages, if necessary.
if ($num_pages > 1) {    
    echo '<p>';
    // Determine what page the script is on.    
    $current_page = ($start/$display) + 1; 
    // If it's not the first page, make a Previous button.
    if ($current_page != 1) {
        echo '<a class="page-link" href="index.php?pagelet=usercontacts&s=' . ($start - $display) . '&np=' . $num_pages . '">Previous</a> ';
    }
    
    // Make all the numbered pages.
    for ($i = 1; $i <= $num_pages; $i++) {
        if ($i != $current_page) {
        	echo '<a class="page-link" href="index.php?pagelet=usercontacts&s=' . (($display * ($i - 1))) . '&np=' . $num_pages . '">' . $i . '</a> ';
        } else {
            echo $i . ' ';
        }
    }
    
    // If it's not the last page, make a Next button.
    if ($current_page != $num_pages) {
        echo '<a class="page-link" href="index.php?pagelet=usercontacts=' . ($start + $display) . '&np=' . $num_pages . '">Next</a>';
    }
    echo '</p>';
    
} // End of links section.	

// Roster menu for contacts
echo '<ul>';
	echo '<li class="admin-list"><a class="admin-link" href="index.php?pagelet=addcontact">Add contact &raquo;</a></li>';
	echo '<li class="admin-list"><a class="admin-link" href="index.php?pagelet=editcontact">Edit contact &raquo;</a></li>';
	echo '<li class="admin-list"><a class="admin-link" href="index.php?pagelet=deletecontact">Delete contact &raquo;</a></li>';
	echo '<li class="admin-list"><a class="admin-link" href="index.php?pagelet=roster">Main menu &raquo;</a></li>';
echo '</ul>';
?>
</div>
<!--End of Content-->