<?php
// PHP Script 1.0 - contact.inc.php
// Created March 31, 2013
// Created by Valery Y. Samovich
// Contact script

// Variables
$invalid = "<a style='text-decoration:none;' href='javascript:history.back();'>Go back and try again</a></p>";

if(isset($_POST['submit'])){  
  
	$name = $_POST['name']; //gets the entered name  
	$email = $_POST['email']; //gets the entered email address  
	$message = $_POST['message']; //gets the entered message   
  
	$to = "valerysamovich@gmail.com"; //email address  
	
	// validating the fields  
	if($name != "" && $email != ""  && $message != ""){  
		mail($to, $name, $email, $message); //calling php mail function
		echo "<p style='text-align:center'>Thank You for Contact Roster Team!</p>";
	} else {  
		echo "<p style='text-align:center'>Please fill in all fields and submit again!</p>"; 
		echo $invalid; 
	}
}

?>
<!--Content-->
<div id="content">
<p>Submit the form below with questions and we will contact you shortly.</p>
<!--Form-->
<form action="index.php?pagelet=contact" method="post" onsubmit="return validateContact();">
<fieldset>
	<legend>Contact form</legend>
	<!--Input fields-->
    <div class="row">
    	<label for="name">Name:</label>
        <input type="text" name="name" id="name" size="40" maxlength="40"  
			value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>" /><br />
    </div> 
	<div class="row">
		<label for="email">Email:</label>
		<input type="text" name="email" id="email" size="40" maxlength="40"
			value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"  /><br />
	</div>
	<div id="row">
		<label >Message:</label>
        <textarea rows="3" cols="40" name="message" id="message" ></textarea><br/ >
	</div>
    <!--End of inputs-->
	<!--Buttons-->
	<div class="submit">
		<input type="submit" name="submit" id="reset" value="Submit" />
        <input type="reset" name="reset" id="reset" value="Reset" />
    </div>
    <!--End of buttons-->
</fieldset>
</form>
<!--End of form-->
</div>
<!--End of content--> 
