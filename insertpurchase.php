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
    <title>Product Purchased</title>
  </head>
  <body>
    <!-- Connects to HTML file with the database we are working with -->
    <?php
      include 'connectdb.php';
    ?>

    <?php
      # Initializes variables to store the purchasers id and the products id that they are purchasing
      $whichCustomer = $_POST["customer"];
      $whichProduct = $_POST["product"];
      $quantity = intval($_POST["quantity"]);

      # Query to insert purchase order into values
      $query = 'INSERT INTO productsold VALUES (' . $whichProduct . ', ' . $whichProduct . ', ' . $quantity . ')';
      # Checks if the query failed and outputs message if it does, otherwise adds row to database
      if ( !mysqli_query($connection, $query) ) {
        die('Error: Insertion Failed' . mysqli_error($connection))
      }

      echo 'Product purchased!';

      # Closes database
      mysqli_close($connection);
    ?>
  </body>
</html>
