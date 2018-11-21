<!--
	Author: Ivgeni Darinski
	Student NO.: 250920885
	Date Created: 2018-11-07
	File: selectcustomer.php
-->

<?php
	# Runs a query to show all our customers ordered by the last name.
	$query = 'SELECT * FROM customer INNER JOIN agent ON customersagentid=agentid ORDER BY lname';
	$result = mysqli_query($connection, $query);

	# Checks if the query wasn't successful; prints error message
	if (!$result) {
		die("Customer Query Failed (selectcustomer.php)");
	}

	#Loops through each row given in the query asked for above
	while ($row = mysqli_fetch_assoc($result)) {
		echo '<div>';
		echo '<input type="radio" name="customers" value="' . $row["CustomerID"] . '" /><b>' . $row["CustomerID"] . '</b>:<br> <b>Name:</b> ' . $row["LName"] . ', ' . $row["FName"] . '<br>';
		echo '<b>Agent:</b> ' . $row["FirstName"] . ' ' . $row["LastName"] . '<br>';
		echo '<b>Address:</b> ' . $row["Address"] . '<br>';
		echo '<b>Phone Number:</b> (***) ' . $row["PhoneNumber"] . '<br><br>';
		echo '<img src="' . $row["cusimage"] . '" width="100" height="100">';
		echo '</div>';
	}
?>
