<!--
  Author: Ivgeni Darinski
  Student NO.: 250920885
  Date Created: 2018-11-11
  File: findcustomerid.php
-->
  <!-- Connects database -->
  <?php
    include 'connectdb.php';
  ?>

  <?php
    # Query to find out the largest customer id
    $query = 'SELECT MAX(CustomerID) as MaxID from customer';
    $result = mysqli_query($connection, $query);

    # Checks if query fails
    if (!$result) {
      die("Something With SQL query went wrong!");
    }

    # Passes the row into an array and adds to the new ID
    $row = mysqli_fetch_assoc($result);
    $newID = intval($row["MaxID"]) + 11;
  ?>

  <!-- Closes connection -->
  <?php
    mysqli_close($connection);
  ?>
