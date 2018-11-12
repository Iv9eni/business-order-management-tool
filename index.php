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

		<h4>Insert Customer Buy Order</h4>

		<!-- To purchase a product for a customer -->
		<form action="insertpurchase.php" method="post">
			<?php
				# Runs two querys to get all the customers and products that customers may purchase.
				$product_query = 'SELECT * FROM product';
				$p_result = mysqli_query($connection, $product_query);

				#Checks if product query was successful
				if ( !$p_result ) {
					die("Query 'SELECT * FROM product' FAILED");
				}

				# Shows customers
				include 'showcustomers.php';

				# Loops through list of products and makes them options of our selection
				while ($row = mysqli_fetch_assoc($p_result)) {
					echo '<input type="radio" value="' . $row["ProdID"] . '">' . $row["Description"] . ' $' . $row["CostPerItem"] . '<br>';
				}
			?>

			<!-- Asks the user the quantity of the product chosen they would like to purchase -->
			Quantity: <input type="text" name="quantity">
			<br><input type="submit" value="Insert Product Purchase">
		</form>

		<!-- START OF 4) Inserting a new customer -->
		<form action="insertcustomer.php" method="post">
				<hr>

				<!-- Table to neatly organize the textboxes and labels for them -->
				<table>

				<!-- Generates new ID for the customer -->
				<?php
					include 'findcustomerid.php';

					# Prints the ID for the user to know when adding a new customer
					echo '<tr><td> ID: <td><b>' . $newID  . '</b>';
				?>

				<!-- This is a table and its elements for neat organization for selection -->
				<tr><td><label for="firstName">First Name:</label> <!-- FIRST NAME -->
				  <td><input type="text" name="firstName" size="20">

				<tr><td><label for="lastName">Last Name:</label> <!-- LAST NAME -->
				  <td><input type="text" name="lastName" size="20"><br>

				<tr><td><label for="address">Address:</label> <!-- ADDRESS -->
					<td><input type="text" name="address" size="20"><br>

				<tr><td><label for="pNumber">Phone Number:</label> <!-- PHONE NUMBER -->
					<td><input type="text" name="pNumber" size="20"><br>

				<tr><td><label for="agent">Agent:</label> <!-- AGENT SELECTION -->
					  <td><select name="agent">

				<!-- PHP to display agents user can select from -->
				<?php
					# Query to find all agents from agent table
					$query = 'SELECT * FROM agent';
					$result = mysqli_query($connection, $query);

					# Checks if query successful
					if (!$result) {
						die("Something went wrong looking for agents!");
					}

					# Loops through all rows of agent and adds them as option to the selection
					while ($row = mysqli_fetch_assoc($result)) {
						echo '<option value=' . $row["AgentID"] . '>' . $row["FirstName"] . ' ' . $row["LastName"] . '</option>';
					}
				?>
				</table>
				<!-- Button to submit details and create new customer -->
				<input type="submit" value="Add New Customer">
		</form>

		<!-- Start of 5) Updating a customers phone number -->
		<hr>
		<b> Update Phone Number </b>

		<!-- Changes a current customers phone number -->
		<form action="updatephonenumber.php" method="post">
			<!-- To show the customers -->
			<?php
				include 'showcustomers.php';
			?>
			<input type="text" name="newNumber">
			<input type="submit" value="Update Phone Number">

		</form>
	</body>
</html>
