<!--
  Author: Ivgeni Darinski
  Student NO.: 250920885
  Date Created: 2018-11-13
  File: AddDeleteCustomers.php
-->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="styling/defaultstyle.css" />
    <link rel="stylesheet" type="text/css" href="styling/AddDeleteCustomer.css" />
    <title>EBAY - Add/Remove Customers</title>
  </head>
  <body>
    <!-- EBAY logo -->
    <img id="logo" src="images\logo.png">

		<!-- Allows navigation through website -->
		<div id="navigationBar">
			<ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="ViewCustomerPurchases.php">View Customer Purchases</a></li>
        <li><a href="Products.php">Products</a></li>
        <li><a href="CreateBuyOrder.php">Create Buy Order</a></li>
        <li><a class="active" href="AddDeleteCustomers.php">Add/Delete Customers</a></li>
        <li><a href="UpdatePhoneNumber.php">Update Phone</a></li>
        <li><a href="OrderSummary.php">Order Summary</a></li>
			</ul>
		</div>

    <!-- Connects to HTML file with the database we are working with -->
    <?php
      include 'functionalPHP\connectdb.php';
    ?>

    <div id="wrapper">

      <!-- START OF 4) Inserting a new customer -->
      <form action="#" method="post">

          <!-- Table to neatly organize the textboxes and labels for them -->
          <table id="tableContainer">

          <!-- Generates new ID for the customer -->
          <?php
            include 'findcustomerid.php';

            # Prints the ID for the user to know when adding a new customer
            echo '<tr><td><label for="ID"> ID:</label>';
            echo '<td><b>' . $newID  . '</b>';
          ?>

          <!-- This is a table and its elements for neat organization for selection -->
          <tr><td><label for="firstName">First Name:</label> <!-- FIRST NAME -->
            <td><input type="text" name="firstName" placeholder="John">

          <tr><td><label for="lastName">Last Name:</label> <!-- LAST NAME -->
            <td><input type="text" name="lastName" placeholder="Doe"><br>

          <tr><td><label for="address">Address:</label> <!-- ADDRESS -->
            <td><input type="text" name="address" placeholder="North Korea"><br>

          <tr><td><label for="pNumber">Phone Number:</label> <!-- PHONE NUMBER -->
            <td><input type="text" name="pNumber" placeholder="***-****"><br>

          <tr><td><label for="agent">Agent:</label> <!-- AGENT SELECTION -->
              <td><select name="agent">

          <!-- PHP to display agents user can select from -->
          <?php
            # Query to find all agents from agent table
            $query = 'SELECT * FROM agent';
            $result = mysqli_query($connection, $query);

            # Checks if query successful
            if (!$result) {
              die("Something went wrong looking for agents!");
            }

            # Loops through all rows of agent and adds them as option to the selection
            while ($row = mysqli_fetch_assoc($result)) {
              echo '<option value=' . $row["AgentID"] . '>' . $row["FirstName"] . ' ' . $row["LastName"] . '</option>';
            }
          ?>

          </table>

          <!-- Button to submit details and create new customer -->
          <input type="submit" name="insertCustomer" value="Add New Customer" id="submission">
          <hr>
      </form>

      <!-- PHP to insert new customer -->
      <?php
        # Checks if the user submitted a new customer
        if (isset($_POST["insertCustomer"])) {

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

          # Displays to user that they have added a new customer
          echo '<script type="text/javascript">alert("Customer Added!");</script>';
        }

      ?>

      <!-- Start of 6) Deleting a customer -->
      <!-- Deletes a customer -->
      <div id="deleteContainer">

        <!-- Form to delete customer -->
        <form action="#" method="post">
          <!-- To show the customers -->
          <?php
            # Gets customer data to print selection
            include 'getcustomerdata.php';

            # Starts a selection operation to pick from a list of customers
            echo '<select name="deleteCustomer" style="margin-bottom: 15px; margin-right: 90px;">';

            # Loops through list of customers and makes them options of our selection
            while ($row = mysqli_fetch_assoc($c_result)) {
              echo '<option value=' . $row["CustomerID"] . '>' . $row["FName"] . ' ' . $row["LName"] .  '</option>';
            }

            echo '</select><br>';
          ?>

          <!-- Submits the change in phone number -->
          <input type="submit" name="delete" value="Delete Customer" style="  width: 220px; height: 35px; margin-left: 10px;">

        </form>

        <!-- PHP to delete customer -->
        <?php
          if (isset($_POST["delete"])) {
            # Initializes CustomerID to be deleted
            $customerID = $_POST["deleteCustomer"];

            # Query to insert into customer table
            $delete_query = 'DELETE FROM customer WHERE customerid=' . $customerID;

            # Checks if the query was successful
            if (mysqli_query($connection, $delete_query)) {
              echo '<script type="text/javascript">alert("Customer Deleted");</script>';
            }
            else {
              die("Query to delete customer failed: " . mysqli_error($connection));
            }
          }
        ?>
    </div>
  </body>
</html>
