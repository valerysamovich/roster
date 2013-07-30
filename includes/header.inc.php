<?php 
session_start(); // Start a session
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--
Roster App 2013 - 1.0
Created March 31, 2013
Created by Valery Y. Samovich
Contacts Management Application
-->
<title><?php echo constant("SITENAME") . ". " . constant(strtoupper($pagelet) . '_TITLE'); ?></title>
<!--Metadata information-->
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="keywords" content="<?php echo constant('META_KEYS') . ' ' . constant(strtoupper($pagelet) . '_KEYS'); ?>" />
<meta name="description" content="<?php echo constant('META_DESC') . ' ' . constant(strtoupper($pagelet) . '_DESC'); ?>" />
<meta name="author" content="<?php echo constant('META_AUTHOR')?>" />
<meta name="copyright" content="<?php echo constant('META_COPY')?>" />
<!--Cascading Style Sheets information-->
<link rel="stylesheet" type="text/css" href="styles/styles.css" />
<!--JavaScripts information-->
<script type="text/javascript" src="scripts/validate.js"></script>
<script type="text/javascript" src="scripts/slideshow.js"></script>
</head>
<body onload="swapImage()">
<!--Header element-->
<div id="header">
	<span id="date"><?php showDate(); ?></span>
    <span id="session"><?php showSession(); ?></span>
  <p class="header-logo">Roster</p>
  <p class="header-description">Contacts Management Application</p>
</div>
<!--End of Header--> 

