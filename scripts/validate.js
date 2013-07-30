// JavaScript 1.0 - validate.js
// Created March 31, 2013
// Created by Valery Y. Samovich
// Client-side forms validation

<!--
// Validate register form input data  
function validateRegister(){
	  
	// Variables declarations
	var firstname = document.getElementById('firstname').value;
	var lastname = document.getElementById('lastname').value;
	var email = document.getElementById('email').value;
	var passwordone = document.getElementById('passwordone').value;
	var passwordtwo = document.getElementById('passwordtwo').value;
	// Email regular expression 
   	var emailRexExp = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	
	// if-else conditional statement for firstname
	if(firstname == ""){
		alert("Please enter a valid first name!");
		document.getElementById('firstname').focus();
		return false;
	}
	
	// if-else conditional statement for lastname
	if(lastname == ""){
		alert("Please enter a valid last name!");
		document.getElementById('lastname').focus();
		return false;
	}
	
	// if-else conditional statement for email
	if (!emailRexExp.test(email)) {
		alert('Please enter a valid email address!');
 		document.getElementById('email').focus();
		return false;
	}
	
	// Passwords Validation
	// if-else conditional statement for passwordone
	if(passwordone == ""){
		alert("Please enter a valid password!");
		document.getElementById('passwordone').focus();
		return false;
	}
	
	// if-else conditional statement for passwordtwo
	if(passwordtwo == ""){
		alert("Please repeat your password!");
		document.getElementById('passwordtwo').focus();
		return false;
	}
	
	// if-else conditional statement to match passwords
	if(passwordone != passwordtwo){
		alert("The passwords don't match!\nPlease try again.");
		return false;
	}
	else{
		return true;
	}
}

// Validate login form input data 
function validateLogin(){ 
	
	// Variables declarations 
	var email = document.getElementById('email').value;
	var password = document.getElementById('password').value;
	
	// Email regular expression 
   	var emailRexExp = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	
	// if-else conditional statement for password
	if (!emailRexExp.test(email)) {
		alert('Please enter a valid email address');
 		document.getElementById('email').focus();
		return false;
	}
	
	// if-else conditional statement for password
	if(password == ""){
		alert("Please enter a valid password!");
		document.getElementById('password').focus();
		return false;
	}
}

// Validate contact form input data
function validateContact(){
	
	// Variables declarations
	var name = document.getElementById('name').value;
	var email = document.getElementById('email').value;
	var message = document.getElementById('message').value;
	
	// email regular expression 
   	var emailRexExp = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	
	// if-else conditional statement for firstname
	if(name == ""){
		alert("Please enter a valid name!");
		document.getElementById('name').focus();
		return false;
	} 	
	
	// if-else conditional statement for email
	if (!emailRexExp.test(email)) {
		alert('Please enter a valid email address');
 		document.getElementById('email').focus();
		return false;
	}
	
	// if-else conditional statement for message
	if(message == ""){
		alert("Please type your message!");
		document.getElementById('message').focus();
		return false;
	}else{
		return true;
	}
}

// Validate add contactform data  
function validateAddContact(){
	  
	// Variables declarations
	var firstname = document.getElementById('firstname').value;
	var lastname = document.getElementById('lastname').value;
	var email = document.getElementById('email').value;
	// Email regular expression 
   	var emailRexExp = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	
	// if-else conditional statement for firstname
	if(firstname == ""){
		alert("Please enter a valid first name!");
		document.getElementById('firstname').focus();
		return false;
	}
	
	// if-else conditional statement for lastname
	if(lastname == ""){
		alert("Please enter a valid last name!");
		document.getElementById('lastname').focus();
		return false;
	}
	
	// if-else conditional statement for email
	if (!emailRexExp.test(email)) {
		alert('Please enter a valid email address!');
 		document.getElementById('email').focus();
		return false;
	}else{
		return true;
	}
}

// Validate add note form input data
function validateAddNote(){
	
	// Variables declarations
	var notename = document.getElementById('notename').value;
	var note = document.getElementById('note').value;
	
	// if-else conditional statement for firstname
	if(notename == ""){
		alert("Please enter a valid name!");
		document.getElementById('notename').focus();
		return false;
	} 	
	
	// if-else conditional statement for message
	if(note == ""){
		alert("Please type your note!");
		document.getElementById('note').focus();
		return false;
	}else{
		return true;
	}
}
//--> 