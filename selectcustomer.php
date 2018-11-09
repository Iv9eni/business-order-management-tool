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
		echo '<input type="radio" name="customers" value="' . $row["CustomerID"] . '" />' . $row["CustomerID"] . ':<br> Name: ' . $row["LName"] . ', ' . $row["FName"] . '<br>';
		echo 'Agent: ' . $row["FirstName"] . ' ' . $row["LastName"] . '<br>';
		echo 'Address: ' . $row["Address"] . '<br>';
		echo 'Phone Number: (***) ' . $row["PhoneNumber"] . '<br><br>'; 
	}
?>
