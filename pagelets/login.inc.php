<?php
// PHP Script 1.0 - login.inc.php
// Created March 31, 2013
// Created by Valery Y. Samovich
// Login script

// error_reporting(E_ALL);
// print_r($_POST);

if(isset($_POST['submit'])){
	
	// Create a function for escaping the data
	function escape_data($data) {
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

	// if-else conditional statement for password
	if (empty($_POST['password'])) {
        $password = FALSE;
        echo '<p style="color:rgb(153, 153, 153);">Please enter valid password!</p>';
	}else{
		$password = escape_data($_POST['password']);
	} // End of validation
	
	// If all data is valid
	if($email && $password){
		
		$query  = "SELECT userid, firstname FROM userstbl WHERE email='$email' AND password=sha1('$password')"; // Make a query
		$result = mysqli_query($dbc, $query) OR die("Error: " . mysqli_error($dbc)); // Run the Query
		
		// The mysql_fetch_array() function returns a row from a recordset
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		
		if($row){
			// Register the values, start the session & redirect
			$_SESSION['userid'] = $row['userid'];
            $_SESSION['firstname'] = $row['firstname'];
			header("Location:  http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/index.php?pagelet=roster");
            exit();
		}else{ // The email and password don't match with database
			echo "<p>The username and password entered do not match those on file!</p>";
		}
		
		mysqli_close($dbc); // Close the database connection function
			
	}else{ // If one of the data tests failed
		echo "<p>Please try again!</p>";
	}
}
?>
<!--Content-->
<div id="content">
<p>Login with your email and password.</p> 
<!--Form-->
<form action="index.php?pagelet=login" method="post" onsubmit="return validateLogin();">
<fieldset>
<legend>Sign in</legend>
	<!--Input fiels-->
	<div class="row">
		<label for="email">Email:</label>
		<input type="text" name="email" id="email"  size="40" maxlength="40" 
			value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" /><br />
	</div>
	<div class="row">
		<label for="password">Password:</label>
        <input type="password" name="password" id="password" size="40" maxlength="40" /><br />
	</div>
    <!--End of inputs-->
	<!--Buttons-->
	<div class="submit">
		<input type="submit" name="submit" id="submit" value="Login" />
        <input type="reset" name="reset" id="reset" value="Reset" />
	</div>
    <!--End of buttons-->
</fieldset>
</form>
<!--End of form--> 
</div>
<!--End of content--> 