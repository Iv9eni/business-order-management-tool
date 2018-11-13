<!--
  Author: Ivgeni Darinski
  Student NO.: 250920885
  Date Created: 2018-11-11
  File: getcustomerdata.php
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

 ?>

 <!-- Closes connection -->
 <?php
   mysqli_close($connection);
 ?>
