<?php
// PHP Script 1.0 - register.inc.php
// Created March 31, 2013
// Created by Valery Y. Samovich
// Registration script

// error_reporting(E_ALL & ~E_NOTICE);
// print_r($_POST);

if(isset($_POST['submit'])) {
	
	// Create a function for escaping the data
	function escape_data($data) {
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
	if (preg_match("^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$", stripslashes(trim($_POST['email'])))) {
        $email = escape_data($_POST['email']);
    } else {
		$email = FALSE;	
        echo '<p style="color:rgb(153, 153, 153);">Please enter valid email address!</p>';
    }
	
	// If-else conditional statement for password
    if (empty($_POST['passwordone'])) {
        $password = FALSE;
        echo '<p style="color:rgb(153, 153, 153);">Please enter valid password!</p>';
    } else {
        if ($_POST['passwordone'] == $_POST['passwordtwo']) {
            $password = escape_data($_POST['passwordone']);
        } else {
            $password = FALSE;
            echo '<p style="color:rgb(153, 153, 153);">Your password did not match the confirmed password!</p>';
        }
	} // End of validation

	// If all data is valid
	if($firstname && $lastname && $email && $password){
		$query = "SELECT email FROM userstbl WHERE email='$email'"; // Set the Query for email availability
		$result = mysqli_query($dbc, $query) OR die("Error: " . mysqli_error($dbc)); // Run the Query
		
		if(mysqli_num_rows($result) == 0){ // The email is available
		
			// Create the activation code.
            $a = md5(uniqid(rand(), true));
			
			// Add user information in database 
			$query = "INSERT INTO userstbl (firstname, lastname, email, password) 
					  VALUES ('$firstname', '$lastname', '$email', sha1('$password'))"; // Set the query 
			$result = mysqli_query($dbc, $query) OR die("Error: " . mysqli_error($dbc)); // Run the Query
			
			// If the new user is registered
			if (mysqli_affected_rows($dbc) == 1) {
				// Send the email
				$message = "Thank you for registering at Roster.com. To activate your account, please click on this link:\n\n";
                $message .= "http://student305.webdev.seminolestate.edu/pagelets/activate.inc.php?x=" . mysqli_insert_id($dbc) . "&y=$a";
                mail($email, 'Registration Confirmation', $message, 'From: admin@roster.com');
				
				// Finish the page.
				echo '<p>Thank you for registering! A confirmation email has been sent to ' . $email . '. Please click on the link in that email in order to activate your account.</p>';
				include ("includes/footer.inc.php"); // Pull in the page footer.
				exit(); // Quit the script.
			}else{ // The user is not register
				echo "<p style='color:rgb(153, 153, 153);'>You could not be registered due to a system error. We apologize for any inconvenience.</p>";
			}
		}else{ // The email is not available.
			echo"<p style='color:rgb(153, 153, 153);'>That email address has already been registered.</p>";
		}
		
	mysqli_close($dbc); // Close the database connection
	
	}else{ // If one of the data tests failed
		echo "<p style='color:rgb(153, 153, 153);'>Please try again!</p>";
	}
}
?>
<!--Content-->
<div id="content">
<p>Please fillout the form to register!</p>
<!--Form-->
<form action="index.php?pagelet=register" method="post" onsubmit="return validateRegister();">
<fieldset>
<legend>Sign up</legend>
    <!--Input fields-->
    <div class="row">
    	<label for="firstname">First name</label>
    	<input type="text" name="firstname" id="firstname" size="40" maxlength="40" 
			value="<?php if (isset($_POST['firstname'])) echo $_POST['firstname']; ?>" /><br />
    </div>
    <div class="row">
    	<label for="lastname">Last name</label>
   		<input type="text" name="lastname" id="lastname" size="40" maxlength="40" 
			value="<?php if (isset($_POST['lastname'])) echo $_POST['lastname']; ?>" /><br />
    </div>
    <div class="row"> 
    	<label for="email">Email:</label>
    	<input type="text" name="email" id="email" size="40" maxlength="40" 
			value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" /><br/ >
    </div>
    <div class="row">
    	<label for="passwordone">Create a password:</label>
    	<input type="password" name="passwordone" id="passwordone" size="30" maxlength="30" /><br/ >
    </div>
    <div class="row">
    	<label for="passwordtwo">Confirm your password:</label>
    	<input type="password" name="passwordtwo" id="passwordtwo" size="30" maxlength="30" /><br/ >
    </div>
    <!--End of inputs-->
    <!--Buttons-->
    <div class="submit">
    	<input type="submit" name="submit" id="submit" value="Register" />
    	<input type="reset" name="reset" id="reset" value="Reset" />
    </div>
    <!--End of buttons-->
</fieldset>
</form>
<!--End of form-->
</div>
<!--End of content--> 

