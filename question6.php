<!--
  Author: Ivgeni Darinski
  Student NO.: 250920885
  Date Created: 2018-11-13
  File: question6.php
-->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="styling/defaultstyle.css" />
  	<link rel="stylesheet" type="text/css" href="styling/question6.css" />
    <title>EBAY - Delete Customer</title>
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
				<li><a href="question3.php">Create Buy Order</a></li>
				<li><a href="question4.php">Add Customer</a></li>
				<li><a href="question5.php">Update Phone</a></li>
        <li><a class="active" href="question6.php">Delete Customer</a></li>
        <li><a href="question9.php">Order Summary</a></li>
			</ul>
		</div>

    <!-- Connects to HTML file with the database we are working with -->
    <?php
      include 'connectdb.php';
    ?>

    <div id="wrapper">
      <!-- Start of 6) Deleting a customer -->
      <!-- Deletes a customer -->
      <div id="container">
        <form action="deletecustomer.php" method="post">
          <!-- To show the customers -->
          <?php
            # Gets customer data to print selection
            include 'getcustomerdata.php';

            # Starts a selection operation to pick from a list of customers
            echo '<select name="customer">';

            # Loops through list of customers and makes them options of our selection
            while ($row = mysqli_fetch_assoc($c_result)) {
              echo '<option value=' . $row["CustomerID"] . '>' . $row["FName"] . ' ' . $row["LName"] .  '</option>';
            }

            echo '</select><br>';
          ?>

          <!-- Submits the change in phone number -->
          <input type="submit" value="Delete Customer">

        </form>
      </div>
    </div>
  </body>
</html>
