<?php
// This file provides the information for accessing the database.and connecting to MySQL. It also sets the language coding to utf-8
// First we define the constants: #1
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'gracestore_db');
// Next we assign the database connection to a variable that we will call $dbcon: #2
$dbcon = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die ('Could not connect to MySQL: ' . mysqli_connect_error () ); #3
// Finally, we set the language encoding.as utf-8
mysqli_set_charset($dbcon, 'utf8');
?>
