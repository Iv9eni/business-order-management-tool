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
    <img id="logo" src="images\logo.png">

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
  		<form action="#" method="post">
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
  			  echo '<p style="display: block; margin-bottom: 20px;"> CUSTOMER </p><select name="customer" id="customerSelect">';
  			  # Loops through list of customers and makes them options of our selection
  			  while ($row = mysqli_fetch_assoc($c_result)) {
  			    echo '<option value=' . $row["CustomerID"] . '>' . $row["FName"] . ' ' . $row["LName"] . '</option>';
  			  }
          # End of select statement
  			  echo '</select>';

          # Start of the product choosing section
          echo '<p style="margin-bottom: 30px; margin-top: 30px;"> PRODUCTS </p>';

          # Putting all the radio buttons into an unordered list
          echo '<ul>';
  				# Loops through list of products and makes them options of our selection
  				while ($row = mysqli_fetch_assoc($p_result)) {
  					echo '<li><input type="radio" name="productsid" value=' . $row["ProdID"] . ' />' . $row["Description"] . ' $' . $row["CostPerItem"] . '</li>';
  				}
          echo '</ul>';
  			?>

  			<!-- Asks the user the quantity of the product chosen they would like to purchase -->
  			<input type="text" name="quantity" placeholder="Quantity" id="quantityTxt" size="15">
  			<br><input type="submit" name="submit" value="Insert Product Purchase" id="subButton">
  		</form>

      <?php
        # Checks if the user submitted the product for purchasing
        if (isset($_POST["submit"])) {

          # Initializes variables to store the purchasers id and the products id that they are purchasing
          $whichCustomer = $_POST["customer"];
          $whichProduct = $_POST["productsid"];
          $quantity = $_POST["quantity"];

          # Query to see if the product has been Purchased
          $search_query = 'SELECT COUNT(*) as ProductExist, Quantity FROM productsold WHERE purchaserid=' . $whichCustomer . ' AND productid=' . $whichProduct;
          $check_product_status = mysqli_query($connection, $search_query);
          $searchRow = mysqli_fetch_assoc($check_product_status)

          # Checks if the customer already purchased the product
          if ($searchRow["ProductExist"] == 1) {

            # Stores quantity purchased and new quantity for calculation of new, larger quantity
            $quantityPurchased = $searchRow["Quantity"];
            $newQuantity = $quantity + $quantityPurchased;

            # Query to insert purchase order into values
            $insert_queryStr = 'INSERT INTO productsold VALUES (' . $whichProduct . ', ' . $whichCustomer . ', ' . $newQuantity . ')';
          }
          else {
            # Query to insert purchase order into values
            $insert_queryStr = 'INSERT INTO productsold VALUES (' . $whichProduct . ', ' . $whichCustomer . ', ' . $quantity . ')';
          }

          # Checks if the query failed and outputs message if it does, otherwise adds row to database
          if ( !mysqli_query($connection, $insert_queryStr) ) {
            die('Error: Insertion Failed: ' . mysqli_error($connection));
          }

          # Alerts user that the purchase was successful
          echo '<script type="text/javascript">alert("Product Purchased Successfully");</script>';

          # Closes database
          mysqli_close($connection);
        }
      ?>
    </div>
  </body>
</html>
