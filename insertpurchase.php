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

      # Queries to see if the purchaser has purchased this product
      $query_check = 'SELECT COUNT(*) as countproducts FROM productsold WHERE purchaserid=' . $whichCustomer . ' AND productid=' . $whichProduct;
      $check_result = mysqli_query($connection, $query_check);

      # Checks if the product exists in sql
      if (countproducts > 0 && $row = mysqli_fetch_assoc($check_result)) {
        echo 'WORKS!!';
      }
    ?>
  </body>
</html>
