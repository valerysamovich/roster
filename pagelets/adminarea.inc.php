<?php
// PHP Script 1.0 - adminarea.inc.php
// Created March 31, 2013
// Created by Valery Y. Samovich
// Admin script

// error_reporting(E_ALL);
// print_r($_POST);

if ($_SESSION['userid'] == '60') {
echo '<ul>';
echo '<li class="admin-list"><a class="admin-link" href="index.php?pagelet=viewusers">View Users &raquo;</a></li>';
echo '<li class="admin-list"><a class="admin-link" href="index.php?pagelet=viewcontacts">View Contacts &raquo;</a></li>';
echo '<li class="admin-list"><a class="admin-link" href="index.php?pagelet=viewnotes">View Notes &raquo;</a></li>';
echo '</ul>';
echo '<p>NOTE: Contact management application. Administrator level.</p>';
} else {
    echo '<p>Please logged in as an admin to view this page!</p>';
}
?>