<!--
  Author: Ivgeni Darinski
  Student NO.: 250920885
  Date Created: 2018-11-13
  File: deletecustomer.php
-->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Deleting a Customer...</title>
  </head>
  <body>
    <!-- Connects database to document -->
    <?php
      include 'connectdb.php';
    ?>

    <!-- PHP to delete customer -->
    <?php
      # Initializes CustomerID to be deleted
      $customerID = $_POST["customer"];

      # Query to insert into customer table
      $delete_query = 'DELETE FROM customer WHERE customerid=' . $customerID;

      # Checks if the query was successful
      if (mysqli_query($connection, $delete_query)) {
        echo '<h2>Successfully deleted customer!</h2>';
      }
      else {
        die("Query to delete customer failed: " . mysqli_error($connection));
      }

    ?>
    <input type="button" value="Return to previous page" onClick="window.location.href = "http://stackoverflow.com";" />
  </body>
</html>
