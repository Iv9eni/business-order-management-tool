<!--
  Author: Ivgeni Darinski
  Student NO.: 250920885
  Date Created: 2018-11-13
  File: question3.php
-->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="styling/defaultstyle.css" />
    <link rel="stylesheet" type="text/css" href="styling/question3.css" />
    <title>EBAY - Create Buy Order</title>
  </head>
  <body>
    <!-- EBAY logo -->
    <img id="logo" src="logo.png" width="420" height="90">

		<!-- Allows navigation through website -->
		<div id="navigationBar">
			<ul>
        <li><a href="index.php">Home</a></li>
				<li><a href="question1.php">View Customer Purchases</a></li>
				<li><a href="question2and8.php">Products</a></li>
				<li><a class="active" href="question3.php">Create Buy Order</a></li>
				<li><a href="question4.php">Add Customer</a></li>
				<li><a href="question5.php">Update Phone</a></li>
        <li><a href="question6.php">Delete Customer</a></li>
        <li><a href="question9.php">Order Summary</a></li>
			</ul>
		</div>

    <!-- Connects to HTML file with the database we are working with -->
    <?php
      include 'connectdb.php';
    ?>
    <div id="wrapper">
    <!-- Start of 3) -->
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
        echo '<p class="customerSelect"> CUSTOMER:           </p>';
			  echo '<select name="customer" class="customerSelect">';
			  # Loops through list of customers and makes them options of our selection
			  while ($row = mysqli_fetch_assoc($c_result)) {
			    echo '<option value=' . $row["CustomerID"] . '>' . $row["FName"] . ' ' . $row["LName"] . '</option>';
			  }

			  echo '</select><br>';

        # To styalize the radio buttons seperately
        echo '<div id="productButtons">';
        echo '<p> CHOOSE PRODUCT </p>';
				# Loops through list of products and makes them options of our selection
				while ($row = mysqli_fetch_assoc($p_result)) {
					echo '<input type="radio" name="product" value="' . $row["ProdID"] . '">' . $row["Description"] . ' $' . $row["CostPerItem"] . '<br>';
				}
        echo '</div>';
			?>

			<!-- Asks the user the quantity of the product chosen they would like to purchase -->
			<input type="text" name="quantity" placeholder="Quantity" id="qualityTxt" size="15">
			<br><input type="submit" value="Insert Product Purchase" id="subButton">
		</form>
  </div>
  </body>
</html>
