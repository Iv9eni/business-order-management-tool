<!--
  Author: Ivgeni Darinski
  Student NO.: 250920885
  Date Created: 2018-11-11
  File: updatephonenumber.php
-->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styling/defaultstyle.css" />
    <title> EBAY - Phone Number Updater</title>
  </head>
  <body>
    <!-- Connects database to HTML document -->
    <?php
      include 'connectdb.php';
    ?>

    <!-- EBAY logo -->
    <img id="logo" src="logo.png">

    <!-- Allows navigation through website -->
    <div id="navigationBar">
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="question1.php">View Customer Purchases</a></li>
        <li><a href="question2and8.php">Products</a></li>
        <li><a href="question3.php">Create Buy Order</a></li>
        <li><a href="question4.php">Add Customer</a></li>
        <li><a href="question5.php">Update Phone</a></li>
        <li><a href="question6.php">Delete Customer</a></li>
      </ul>
    </div>

    <!-- Updates the customers phone number -->
    <?php
      # Query string required to run the proper query
      $update_query = 'UPDATE customer SET phonenumber="' . $_POST["newNumber"] . '" WHERE customerid=' . $_POST["customer"];

      # Querys to SQL and checks if the query is successful
      if (mysqli_query($connection, $update_query)) {
        echo 'Record successfully updated';
      }
      # If query unsuccessful run this
      else {
        echo 'Error updating record: ' . mysqli_error($connection);
      }
    ?>
  </body>
</html>
