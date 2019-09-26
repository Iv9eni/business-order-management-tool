<!--
	Author: Ivgeni Darinski
	Student NO.: 250920885
	Date Created: 2018-11-07
	File: connectdb.php
-->

<?php
	# The host, username, password, and database name used to connect to the SQL and database we will be using
	$dbhost = "localhost";
	$dbuser = "id10891963_root";
	$dbpass = "cs3319";
	$dbname = "id10891963_idarinskassign2db";

	# Stores the MYSQL database in connection to run querys, store/modify data,  etc..
	$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	# Checks if connection to the SQL database was successful
	if (mysqli_connect_errno()) {
		die("Database connection failed :" . mysqli_connect_error() . "(" . mysqli_connect_errno() . ")" );
	}
?>
