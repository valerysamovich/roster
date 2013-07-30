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
		
		$query = "INSERT INTO notestbl (notename, note, userid) 
				  VALUES ('$notename', '$note', '$_SESSION[userid]')"; // Make a query
		$result = mysqli_query($dbc, $query) OR die("Error: " . mysqli_error($dbc)); // Run the Query
			
		// If the new user is registered
		if($result){
			echo "<p>1 note added!</p>";
			// Roster menu
			echo '<ul>';
			echo '<li class="admin-list"><a class="admin-link" href="index.php?pagelet=roster">Main menu &raquo;</a></li>';	
			echo '<li class="admin-list"><a class="admin-link" href="index.php?pagelet=usernotes">Notes menu &raquo;</a></li>';
			echo '</ul>';
			// Pull in the page footer.
			include ("includes/footer.inc.php");
			exit(); // Quit the script.
		}else{ // The user is not register
			echo "<p style='color:rgb(153, 153, 153);'>Could't be added. System error. We apologize.</p>";
		}
	}
		
	mysqli_close(); // Close the database connection function
	
}
?>
<!--Content-->
<div id="content">
<p>Please fillout the form to add new note.</p>
<!--Form-->
<form action="index.php?pagelet=addnote" method="post" onsubmit="return validateAddNote();">
<fieldset>
    <legend>Add new note</legend>
    <!--Input fields-->
    <div class="row">
    <label for="notename">Title:</label>
    <input type="text" name="notename" id="notename" size="40" maxlength="40" 
    	   value="<?php if (isset($_POST['notename'])) echo $_POST['notename']; ?>" /><br />
    </div>
    <div class="row">
    	<label for="note">Note:</label>
    	<textarea rows="5" cols="40" name="note" id="note" ></textarea><br/ >
    </div>
	<!--End of inputs-->
    <!--Buttons-->
    <div class="submit">
    	<input type="submit" name="submit" id="submit" value="Add note" />
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