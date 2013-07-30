<?php
// PHP Script 1.0 - addcontact.inc.php
// Created March 31, 2013
// Created by Valery Y. Samovich
// New contact script

// error_reporting(E_ALL & ~E_NOTICE);
// print_r($_POST);

if(isset($_POST['submit'])) {
	
	// Create a function for escaping the data
    function escape_data ($data) {
        global $dbc; // Need the connection.
        if (ini_get('magic_quotes_gpc')) {
           $data = stripslashes($data);
        }
        return mysql_escape_string($data);
    } // End of function.
	
	// If-else conditional statement for notename
    if (!empty($_POST['notename'])) {
		$notename = escape_data($_POST['notename']);
    } else {
		$notename = FALSE;
        echo '<p style="color:rgb(153, 153, 153);">Please enter valid note name!</p>';
    }

	// If-else conditional statement for last name
	if (!empty($_POST['note'])) {
		$note = escape_data($_POST['note']);
    } else {
		$note = FALSE;
        echo '<p style="color:rgb(153, 153, 153);">Please enter valid note!</p>';
    }

	// If all data is valid
	if($notename && $note){
		
		$query = "UPDATE notestbl SET note='$note' WHERE notename='$notename'"; // Make a query
		$result = mysqli_query($dbc, $query) OR die("Error: " . mysqli_error($dbc)); // Run the Query
			
		// If the new user is registered
		if($result){
			echo "<p>The note was successfully edited!</p>";
			// Roster menu
			echo '<ul>';
			echo '<li class="admin-list"><a class="admin-link" href="index.php?pagelet=roster">Main menu &raquo;</a></li>';
			echo '<li class="admin-list"><a class="admin-link" href="index.php?pagelet=usernotes">Notes menu &raquo;</a></li>';	
			echo '</ul>';
			// Pull in the page footer.
			include ("includes/footer.inc.php");
			exit(); // Quit the script.
		}else{ // The user is not register
			echo "<p style='color:rgb(153, 153, 153);'>Could't be edited. System error. We apologize.</p>";
		}
	}
		
	mysqli_close(); // Close the database connection function
	
}
?>
<!--Content-->
<div id="content">
<p><span style="color:#F00">Important:</span> fillout the form to edit the note. The title can't be changed and must be typed correctly in title field. Otherwise, the note will not update!</p>

<!--Form-->
<form action="index.php?pagelet=editnote" method="post" onsubmit="return validateAddNote();">
<fieldset>
    <legend>Edit the note</legend>
    <!--Input fields-->
    <div class="row">
    <label for="notename">Title of note:</label>
    <input type="text" name="notename" id="notename" size="40" maxlength="40" 
    	   value="<?php if (isset($_POST['notename'])) echo $_POST['notename']; ?>" /><br />
    </div>
    <div class="row">
    	<label for="note">Note (update):</label>
    	<textarea rows="5" cols="40" name="note" id="note" ></textarea><br/ >
    </div>
	<!--End of inputs-->
    <!--Buttons-->
    <div class="submit">
    	<input type="submit" name="submit" id="submit" value="Edit note" />
    	<input type="reset" name="reset" id="reset" value="Reset" />
    </div>
    <!--End of buttons-->
</fieldset>
</form>
<!--End of form-->
</div>
<!--End of content-->
<?php  
// Roster menu
echo '<ul>';
echo '<li class="admin-list"><a class="admin-link" href="index.php?pagelet=roster">Main menu &raquo;</a></li>';	
echo '<li class="admin-list"><a class="admin-link" href="index.php?pagelet=usernotes">Notes menu &raquo;</a></li>';
echo '</ul>';
?>