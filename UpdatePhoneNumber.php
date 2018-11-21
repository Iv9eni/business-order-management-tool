<!--
  Author: Ivgeni Darinski
  Student NO.: 250920885
  Date Created: 2018-11-13
  File: question5.php
-->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="styling/defaultstyle.css" />
    <link rel="stylesheet" type="text/css" href="styling/question5.css" />
    <title>EBAY - Update Customer Phone</title>
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
				<li><a href="question4.php">Add/Delete Customers</a></li>
				<li><a class="active" href="question5.php">Update Phone</a></li>
        <li><a href="question9.php">Order Summary</a></li>
			</ul>
		</div>

    <!-- Connects to HTML file with the database we are working with -->
    <?php
      include 'connectdb.php';
    ?>
    <div id="wrapper">
      <div id="updateNumberContainer">
      <!-- Start of 5) Updating a customers phone number -->
      <!-- Changes a current customers phone number -->
      <form action="#" method="post">
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

          echo '</select>';
        ?>

        <!-- Submits the change in phone number -->
        <input type="text" name="newNumber" placeholder="New Phone Number"><br>
        <input type="submit" name="updatePhone" value="Update Phone Number">

      </form>

      <!-- Updates the customers phone number -->
      <?php
        # Checks if user submitted something for updating
        if (isset($_POST["updatePhone"])) {
          # Query string required to run the proper query
          $update_query = 'UPDATE customer SET phonenumber="' . $_POST["newNumber"] . '" WHERE customerid=' . $_POST["customer"];

          # Querys to SQL and checks if the query is successful
          if (mysqli_query($connection, $update_query)) {
            echo 'Phone Number Updated';
          }
          # If query unsuccessful run this
          else {
            echo 'Error updating record: ' . mysqli_error($connection);
          }
        }
      ?>
    </div>
  </body>
</html>
