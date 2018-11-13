<!--
  Author: Ivgeni Darinski
  Student NO.: 250920885
  Date Created: 2018-11-09
  File: insertpurchases.php
-->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styling/defaultstyle.css" />
    <title>Product Purchased</title>
  </head>
  <body>
    <!-- Connects to HTML file with the database we are working with -->
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

    <?php
      # Initializes variables to store the purchasers id and the products id that they are purchasing
      $whichCustomer = $_POST["customer"];
      $whichProduct = $_POST["product"];
      $quantity = $_POST["quantity"];

      # Query to insert purchase order into values
      $query = 'INSERT INTO productsold VALUES (' . $whichProduct . ', ' . $whichProduct . ', ' . intval($quantity) . ')';

      # Checks if the query failed and outputs message if it does, otherwise adds row to database
      if ( !mysqli_query($connection, $query) ) {
        die('Error: Insertion Failed: ' . mysqli_error($connection));
      }

      # Welcome
      echo 'Product purchased!';

      # Closes database
      mysqli_close($connection);
    ?>
  </body>
</html>
