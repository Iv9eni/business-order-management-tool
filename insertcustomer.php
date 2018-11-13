<!--
  Author: Ivgeni Darinski
  Student NO.: 250920885
  Date Created: 2018-11-11
  File: insertcustomer.php
-->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>EBAY - Add New Customer</title>
  </head>
  <body>
    <!-- Connects database to document -->
    <?php
      include 'connectdb.php';
    ?>

    <!-- PHP to insert new customer -->
    <?php
      # Finds a new customerID and initializes it
      include 'findcustomerid.php';
      $customerID = $newID;

      # Variables initializing all new customer attributes
      $customerFName = $_POST["firstName"];
      $customerLName = $_POST["lastName"];
      $customerAddress = $_POST["address"];
      $customerPhone = $_POST["pNumber"];
      $customerAgent = $_POST["agent"];

      # Query to insert into customer table
      $query = 'INSERT INTO customer VALUES (' . $customerID . ',' . $customerAgent . ',"' . $customerFName . '","' . $customerLName . '","' . $customerAddress . '","' . $customerPhone . '")';
      $insert_result = mysqli_query($connection, $query);

      # Checks if the query was successful
      if ( !$insert_result ) {
        die("Query to insert customer failed: " . mysqli_error($connection));
      }

    ?>

    <!-- Closes connection -->
    <?php
      mysqli_close($connection);
    ?>

  </body>
</html>
