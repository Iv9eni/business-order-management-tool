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
      $whichCustomer = $_POST["customer"];
    ?>
  </body>
</html>
