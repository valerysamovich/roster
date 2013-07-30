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
	
	// If-else conditional statement for first name
    if (!empty($_POST['firstname'])) {
		$firstname = escape_data($_POST['firstname']);
    } else {
		$firstname = FALSE;
        echo '<p style="color:rgb(153, 153, 153);">Please enter valid first name!</p>';
    }

	// If-else conditional statement for last name
	if (!empty($_POST['lastname'])) {
		$lastname = escape_data($_POST['lastname']);
    } else {
		$lastname = FALSE;
        echo '<p style="color:rgb(153, 153, 153);">Please enter valid last name!</p>';
    }

	// If-else conditional statement for email
	if (eregi ("^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$", stripslashes(trim($_POST['email'])))) {
        $email = escape_data($_POST['email']);
    } else {
		$email = FALSE;	
        echo '<p style="color:rgb(153, 153, 153);">Please enter valid email address!</p>';
    }

	// If all data is valid
	if($firstname && $lastname && $email){
		
		$query = "UPDATE contactstbl SET firstname='$firstname', lastname='$lastname' WHERE email='$email'"; // Make a query
		$result = mysqli_query($dbc, $query) OR die("Error: " . mysqli_error($dbc)); // Run the Query
		
		// If the new user is registered
		if($result){
			echo "<p>The contact was successfully edited!</p>";
			echo '<ul>';
			echo '<li class="admin-list"><a class="admin-link" href="index.php?pagelet=roster">Main menu &raquo;</a></li>';	
			echo '<li class="admin-list"><a class="admin-link" href="index.php?pagelet=usercontacts">Contacts menu &raquo;</a></li>';
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
<p><span style="color:#F00">Important:</span> fill out the form to edit the contact first and last name. The email can't be changed and must be typed correctly in email field. Otherwise, the contact will not update!</p>
<!--Form-->
<form action="index.php?pagelet=editcontact" method="post" onsubmit="return validateAddContact();">
<fieldset>
	<legend>Edit the contact</legend>
    <!--Input fields-->
    <div class="row">
   		<label for="firstname">First name(update):</label>
    	<input type="text" name="firstname" id="firstname" size="40" maxlength="40" 
    		value="<?php if (isset($_POST['firstname'])) echo $_POST['firstname']; ?>" /><br />
    </div>
    <div class="row">
    	<label for="lastname">Last name(update):</label>
    	<input type="text" name="lastname" id="lastname" size="40" maxlength="40" 
    		value="<?php if (isset($_POST['lastname'])) echo $_POST['lastname']; ?>" /><br />
    </div>
    <div class="row"> 
    	<label for="email">Email of contact:</label>
    	<input type="text" name="email" id="email" size="40" maxlength="40" 
    	   value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" /><br/ >
    </div>
 	<!--End of inputs-->
    <!--Buttons-->
    <div class="submit">
    	<input type="submit" name="submit" id="submit" value="Edit contact" />
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

