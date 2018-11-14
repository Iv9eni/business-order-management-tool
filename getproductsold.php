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
	<link rel="stylesheet" type="text/css" href="styling/defaultstyle.css" />

	<!-- To stylize the page a little -->
	<style>
		ol, h3 {
			margin-left: 50px;
			margin-top: 50px;
		}
	</style>

	<title>EBAY - Customers Products</title>
</head>
<body>
	<!-- EBAY logo on every site -->
	<img id="logo" src="logo.png" width="420" height="90">

	<!-- Allows navigation through website -->
	<div id="navigationBar">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a class="active" href="question1.php">View Customer Purchases</a></li>
			<li><a href="question2and8.php">Products</a></li>
			<li><a href="question3.php">Create Buy Order</a></li>
			<li><a href="question4.php">Add Customer</a></li>
			<li><a href="question5.php">Update Phone</a></li>
			<li><a href="question6.php">Delete Customer</a></li>
			<li><a href="question9.php">Order Summary</a></li>
		</ul>
	</div>

	<!-- Connects to the database -->
	<?php
		include 'connectdb.php';
	?>

	<h3> Products Purchased by Selected Customer: </h3>

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
			echo '<li style="padding: 5px">' . $row["description"] . '</li>';
		}
		mysqli_free_result($result);
	?>
</ol>

	<!-- Closes connection -->
	<?php
		mysqli_close($connection);
	?>

</body>
</html>
