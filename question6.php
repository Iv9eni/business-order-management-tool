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
		<link rel="stylesheet" type="text/css" href="defaultstyle.css" />
    <title>EBAY - Update Customer Phone</title>
  </head>
  <body>
    <!-- EBAY logo -->
    <img src="logo.png" width="250" height="90">

		<!-- Allows navigation through website -->
		<div id="navigationBar">
			<ul>
        <li><a href="index.php">Home</a></li>
				<li><a href="question1.php">1</a></li>
				<li><a href="question2.php">2</a></li>
				<li><a href="question3.php">3</a></li>
				<li><a href="question4.php">4</a></li>
				<li><a href="question5.php">5</a></li>
        <li><a href="question6.php">6</a></li>
			</ul>
		</div>

		<br><br>

    <!-- Connects to HTML file with the database we are working with -->
    <?php
      include 'connectdb.php';
    ?>

    <!-- Start of 6) Deleting a customer -->
    <!-- Deletes a customer -->
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

  </body>
</html>
