<!--
  Author: Ivgeni Darinski
  Student NO.: 250920885
  Date Created: 2018-11-11
  File: showcustomers.php
-->

<?php
  # Connects to database
  include 'connectdb.php';

  # Runs query to check which customers are available to have their phone number updated
  $customer_query = 'SELECT * FROM customer';
  $c_result = mysqli_query($connection, $customer_query);

  # Checks if customer query was successful
  if ( !$c_result ) {
    die("Query 'SELECT * FROM customers' FAILED");
  }

  # Starts a selection operation to pick from a list of customers
  echo '<select name="customer">';

  # Loops through list of customers and makes them options of our selection
  while ($row = mysqli_fetch_assoc($c_result)) {
    echo '<option value=' . $row["CustomerID"] . '>' . $row["FName"] . ' ' . $row["LName"] . '</option>';
  }

  echo '</select><br>';

 ?>
