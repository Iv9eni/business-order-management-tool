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
    <img src="logo.png" width="100" height="60">

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

    <!-- Start of 5) Updating a customers phone number -->
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
