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
		<title>EBAY Admin Tools</title>
		<link rel="stylesheet" type="text/css" href="defaultstyle.css" />
	</head>
	<body>
		<!-- Allows navigation through website -->
		<ul id="navigationBar">
			<li><a href="index.php">SHOW CUSTOMER SALES</li>
			<li><a href="productinformation.php">PRODUCT INFORMATION</li>
			<li><a href="">SHOW CUSTOMER SALES</li>
			<li><a href="">SHOW CUSTOMER SALES</li>
			<li><a href="">SHOW CUSTOMER SALES</li>
		</ul>

		<!-- Connects to HTML file with the database we are working with -->
		<?php
			include 'connectdb.php';
		?>

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


		<!-- Start of 3) -->

		<h4>Insert Customer Buy Order</h4>

		<!-- To purchase a product for a customer -->
		<form action="insertpurchase.php" method="post">
			<?php
				# To display available customers to update
				include 'getcustomerdata.php';

				# Runs two querys to get all the customers and products that customers may purchase.
				$product_query = 'SELECT * FROM product';
				$p_result = mysqli_query($connection, $product_query);

				#Checks if product query was successful
				if ( !$p_result ) {
					die("Query 'SELECT * FROM product' FAILED");
				}

				# Starts a selection operation to pick from a list of customers
			  echo '<select name="customer">';

			  # Loops through list of customers and makes them options of our selection
			  while ($row = mysqli_fetch_assoc($c_result)) {
			    echo '<option value=' . $row["CustomerID"] . '>' . $row["FName"] . ' ' . $row["LName"] . '</option>';
			  }

			  echo '</select><br>';

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
				  <td><input type="text" name="firstName">

				<tr><td><label for="lastName">Last Name:</label> <!-- LAST NAME -->
				  <td><input type="text" name="lastName"><br>

				<tr><td><label for="address">Address:</label> <!-- ADDRESS -->
					<td><input type="text" name="address"><br>

				<tr><td><label for="pNumber">Phone Number:</label> <!-- PHONE NUMBER -->
					<td><input type="text" name="pNumber"><br>

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
				# Gets customer data to print selection
				include 'getcustomerdata.php';

				# Starts a selection operation to pick from a list of customers
				echo '<select name="customer">';

				# Loops through list of customers and makes them options of our selection
				while ($row = mysqli_fetch_assoc($c_result)) {
					echo '<option value=' . $row["CustomerID"] . '>' . $row["FName"] . ' ' . $row["LName"] . ' - ' . $row["PhoneNumber"]  . '</option>';
				}

				echo '</select><br>';
			?>

			<!-- Submits the change in phone number -->
			<input type="text" name="newNumber">
			<input type="submit" value="Update Phone Number">

		</form>
	</body>
</html>
