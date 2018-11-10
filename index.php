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

			<!-- Button for user to accept all values of search and search the products purchased by customer -->
			<input type="submit" value="Show Purchased Products">

		</form>

		<!-- Start of 2) -->
		<h3>PRODUCTS</h3>
		<p>Product Ordering Options:</p>

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

		<hr>

		<!-- Start of 3) -->

		<h4>Buy Products</h4>

		<!-- To purchase a product for a customer -->
		<form action="insertpurchase.php" method="post">
			<?php
				# Runs two querys to get all the customers and products that customers may purchase.
				$customer_query = 'SELECT * FROM customers';
				$product_query = 'SELECT * FROM product';
				$c_result = mysqli_query($connection, $customer_query);
				$p_result = mysqli_query($connection, $product_query);

				# Checks if either queries have worked
				if ( !$c_result ) {
					die("Query 'SELECT * FROM customers' FAILED");
				}
				if ( !$p_result ) {
					die("Query 'SELECT * FROM product' FAILED");
				}

				# Prints to the user some information about the selections they are making; Case: customer
				echo '<p>Customer Buying the Product</p>';

				# Starts a selection operation to pick from a list of customers
				echo '<select name="customer">';
				# Loops through list of customers and makes them options of our selection
				while ($row = mysqli_fetch_assoc($c_result)) {
					echo '<option value="' . $row["customerid"] . '">' . $row["fname"] . ' ' . $row["lname"] . '</option>';
				}
				echo '</select>'

				# Prints to the user some information about the selections they are making; Case: product
				echo '<p>Product Being Purchased</p>';
				# Starts a selection operation to pick from a list of products to buy
				echo '<select name="product">';
				# Loops through list of products and makes them options of our selection
				while ($row = mysqli_fetch_assoc($p_result)) {
					echo '<option value="' . $row["prodid"] . '">' . $row["description"] . ' ' . $row["costperitem"] . '</option>';
				}
				echo '</select>'

			?>

			<input type="submit" value="Insert Product Purchase">
		</form>

	</body>
</html>
