<!--
	Author: Ivgeni Darinski
	Student NO.: 250920885
	Date Created: 2018-11-09
	File: getproducts.php
-->

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Products</title>
</head>
<body>
	<!-- Connects to the database -->
	<?php
		include 'connectdb.php';
	?>

	<h3> Products </h3>

	<ul>
	<?php
		# Query to order products
		$query = 'SELECT description, costperitem FROM product ORDER BY ' . $_POST["orderby"] . ' ' . $_POST["order"];

		# Runs the query and sets it to a variable
		$result = mysqli_query($connection, $query);

		# Checks to see if the query was completed successfully
		if (!$result) {
			die("Query To Find Products Failed!");
		}

		# Loops through each row in the query
		while ($row = mysqli_fetch_assoc($result)) {
			echo '<li>' . $row["description"] . ' $' . $row["costperitem"] .  '</li>';
		}

		mysqli_free_result($result);
	?>
	</ul>

	<?php
		mysqli_close($connection);
	?>

</body>
</html>
