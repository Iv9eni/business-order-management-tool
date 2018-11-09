<!--
	Author: Ivgeni Darinski
	Student NO.: 250920885
	Date Created: 2018-11-07
	File: getproductsold.php
-->

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Customers Products</title>
</head>
<body>
	<!-- Connects to the database -->
	<?php
		include 'connectdb.php';
	?>

	<h3> Products Purchased by Selected Customer </h3>

	<ol>
	<?php
		# Initializes the variable with the customer id that was selected in the index page and runs a query to find their purchased products
		$selectedID = (string)$_POST["customers"];
		$query = 'SELECT fname, description FROM productsold INNER JOIN product ON productid=prodid INNER JOIN customer ON purchaserid=customerid WHERE customerid="' . $selectedID . '" ORDER BY description ' . $_POST["order"];

		# Checks if the user selected a value
		if ($selectedID == NULL) {
			echo '<p>ERROR1: No Customer Selected</p>';
		}

		# Runs the query and sets it to a variable
		$result = mysqli_query($connection, $query);

		# Checks to see if the query was completed successfully
		if (!$result) {
			die("Query To Find Customers Purchased Products Failed!");
		}

		# Loops through each row in the query
		while ($row = mysqli_fetch_assoc($result)) {
			echo '<li>' . $row["description"] . '</li>';
		}
		mysqli_free_result($result);
	?>
	</ol>

	<?php
		mysqli_close($connection);
	?>

</body>
</html>
