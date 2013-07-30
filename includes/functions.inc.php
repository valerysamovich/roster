<?php
// PHP Script 1.0 - functions.inc.php
// Created March 31, 2013
// Created by Valery Y. Samovich

// Show date
function showDate(){
     $today = date("F j, Y");
     echo $today;
}

// Show session info for header
function showSession(){
	if ($_SESSION['userid'] == '60')  {
		echo '<a href="index.php?pagelet=adminarea" class="function">Admin</a>&nbsp;|&nbsp;';
	}
	if ($_SESSION['userid'] != '')  {
		echo  $_SESSION['firstname'] . '&nbsp;|&nbsp;<a href="index.php?pagelet=logout" class="function">Logout</a>';
	} else {
		echo '<a href="index.php?pagelet=login" class="function">Login</a>';
	}
}

// Show session info for main navigation
function sessionMainNav(){
	if ($_SESSION['userid'] == '60') {
		echo '<a href="index.php?pagelet=index">' . constant("HOME") . '</a>
    			<span class="navigation-devider">&nbsp;|&nbsp;</span></li>
    		<li><a href="index.php?pagelet=logout">' . constant("LOGOUT"). '</a>
    			<span class="navigation-devider">&nbsp;|&nbsp;</span></li>
			<li><a href="index.php?pagelet=adminarea">' . constant("ADMINAREA"). '</a>
    			<span class="navigation-devider">&nbsp;|&nbsp;</span></li>
    		<li><a href="index.php?pagelet=contact">' . constant("CONTACT") . '</a>';
	}else if ($_SESSION['userid'] != '') {
		echo '<a href="index.php?pagelet=index">' . constant("HOME") . '</a>
    			<span class="navigation-devider">&nbsp;|&nbsp;</span></li>
    		<li><a href="index.php?pagelet=logout">' . constant("LOGOUT"). '</a>
    			<span class="navigation-devider">&nbsp;|&nbsp;</span></li>
    		<li><a href="index.php?pagelet=roster">' . constant("ROSTER") . '</a>
    			<span class="navigation-devider">&nbsp;|&nbsp;</span></li>
    		<li><a href="index.php?pagelet=contact">' . constant("CONTACT") . '</a>';
	} else {
		echo '<a href="index.php?pagelet=index">' . constant("HOME") . '</a>
    			<span class="navigation-devider">&nbsp;|&nbsp;</span></li>
    		<li><a href="index.php?pagelet=login">' . constant("LOGIN"). '</a>
    			<span class="navigation-devider">&nbsp;|&nbsp;</span></li>
    		<li><a href="index.php?pagelet=register">' . constant("REGISTER") . '</a>
    			<span class="navigation-devider">&nbsp;|&nbsp;</span></li>
    		<li><a href="index.php?pagelet=roster">' . constant("ROSTER") . '</a>
    			<span class="navigation-devider">&nbsp;|&nbsp;</span></li>
    		<li><a href="index.php?pagelet=contact">' . constant("CONTACT") . '</a>';
	}
}
// Show session info for footer navigation
function sessionFooterNav(){
	if ($_SESSION['userid'] == '60') {
		echo '<a href="index.php?pagelet=index">' . constant("HOME") . '</a>
    			<span class="footer-devider">&nbsp;|&nbsp;</span></li>
    		<li><a href="index.php?pagelet=logout">' . constant("LOGOUT"). '</a>
    			<span class="footer-devider">&nbsp;|&nbsp;</span></li>
			<li><a href="index.php?pagelet=adminarea">' . constant("ADMINAREA"). '</a>
    			<span class="footer-devider">&nbsp;|&nbsp;</span></li>
    		<li><a href="index.php?pagelet=contact">' . constant("CONTACT") . '</a>';
	}else if ($_SESSION['userid'] != '') {
		echo '<a href="index.php?pagelet=index">' . constant("HOME") . '</a>
    			<span class="footer-devider">&nbsp;|&nbsp;</span></li>
    		<li><a href="index.php?pagelet=logout">' . constant("LOGOUT"). '</a>
    			<span class="footer-devider">&nbsp;|&nbsp;</span></li>
    		<li><a href="index.php?pagelet=roster">' . constant("ROSTER") . '</a>
    			<span class="footer-devider">&nbsp;|&nbsp;</span></li>
    		<li><a href="index.php?pagelet=contact">' . constant("CONTACT") . '</a>';
	} else {
		echo '<a href="index.php?pagelet=index">' . constant("HOME") . '</a>
    			<span class="footer-devider">&nbsp;|&nbsp;</span></li>
    		<li><a href="index.php?pagelet=login">' . constant("LOGIN"). '</a>
    			<span class="footer-devider">&nbsp;|&nbsp;</span></li>
    		<li><a href="index.php?pagelet=register">' . constant("REGISTER") . '</a>
    			<span class="footer-devider">&nbsp;|&nbsp;</span></li>
    		<li><a href="index.php?pagelet=roster">' . constant("ROSTER") . '</a>
    			<span class="footer-devider">&nbsp;|&nbsp;</span></li>
			<li><a href="index.php?pagelet=admin">' . constant("ADMIN") . '</a>
    			<span class="footer-devider">&nbsp;|&nbsp;</span></li>
    		<li><a href="index.php?pagelet=contact">' . constant("CONTACT") . '</a>';
	}
}
?>