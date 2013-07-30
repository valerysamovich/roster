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
	
	// If-else conditional statement for email
	if (eregi ("^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$", stripslashes(trim($_POST['email'])))) {
        $email = escape_data($_POST['email']);
    } else {
		$email = FALSE;	
        echo '<p style="color:rgb(153, 153, 153);">Please enter valid email address!</p>';
    }

	// If all data is valid
	if($email){
		
		$query = "DELETE FROM contactstbl WHERE email='$email'"; // Make a query
		$result = mysqli_query($dbc, $query) OR die("Error: " . mysqli_error($dbc)); // Run the Query
			
		// If the new user is registered
		if($result){
			echo "<p>The contact was successfully deleted!</p>";
			echo '<ul>';
			echo '<li class="admin-list"><a class="admin-link" href="index.php?pagelet=roster">Main menu &raquo;</a></li>';	
			echo '<li class="admin-list"><a class="admin-link" href="index.php?pagelet=usercontacts">Contacts menu &raquo;</a></li>';
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
<p><span style="color:#F00">Important:</span> contact will be deleted permanently.</p>
<!--Form-->
<form action="index.php?pagelet=deletecontact" method="post" onsubmit="return validateAddContact();">
<fieldset>
	<legend>Delete a contact</legend>
    <div class="row"> 
    	<label for="email">Email:</label>
    	<input type="text" name="email" id="email" size="40" maxlength="40" 
    	   value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" /><br/ >
    </div>
 	<!--End of inputs-->
    <!--Buttons-->
    <div class="submit">
    	<input type="submit" name="submit" id="submit" value="Delete contact" />
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
	echo '<li class="admin-list"><a class="admin-link" href="index.php?pagelet=usercontacts">Contacts menu &raquo;</a></li>';	
echo '</ul>';
?>

