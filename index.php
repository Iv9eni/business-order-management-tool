<!--
	Author: Ivgeni Darinski
	Student NO.: 250920885
	Date Created: 2018-11-07
	File: index.php
-->

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>EBAY</title>
		<link rel="stylesheet" type="text/css" href="index.css" />
	</head>
	<body>
		<!-- Connects to HTML file with the database we are working with -->
		<?php
			include 'connectdb.php';
		?>

		<h2> EBAY </h2>

		<!-- 1) Allows you to see the products a specific customer has purchased -->
		<form action="getproductsold.php" method="post">

			<!-- Allows the user to select the way purchased products by a customer are organized -->
			<p>ORDER PRODUCT BY:</p>
			<input type="radio" name="order" value="ASC" checked="checked">Ascending<br>
			<input type="radio" name="order" value="DESC">Descending<br><br>

			<!-- Shows all the customers user may select from -->
			<?php
				include 'selectcustomer.php';
			?>

			<input type="submit" value="Show Products">

		</form>

		<!-- Start of 2) -->
		<h3>PRODUCTS</h3>

		<!-- Form to find products and order in a certain manner depicted by user -->
		<form action="getproducts.php" method="post">

			<!-- Allows user to select from ascending/descending orders through a selection bar -->
			<select name="order">
				<option value="ASC">Ascending</option>
				<option value="DESC">Descending</option>
			</select>

			<!-- Line break for style B) -->
			<hr>

			<!-- Radio buttons to select which attribute to order the products by -->
			<input type="radio" name="orderby" value="costperitem" checked="checked">ORDER BY PRICE<br>
			<input type="radio" name="orderby" value="description">ORDER BY NAME<br>

			<input type="submit" value = "Show Products">

		</form>

		<!-- Start of 3) -->
		<form action="insertpurchase.php" method="post">
			


		</form>

	</body>
</html>
