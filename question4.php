<!--
  Author: Ivgeni Darinski
  Student NO.: 250920885
  Date Created: 2018-11-13
  File: question4.php
-->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="styling/defaultstyle.css" />
    <title>EBAY - Insert New Customer</title>
  </head>
  <body>
    <!-- EBAY logo -->
    <img id="logo" src="logo.png" width="420" height="90">

		<!-- Allows navigation through website -->
		<div id="navigationBar">
			<ul>
        <li><a href="index.php">Home</a></li>
				<li><a href="question1.php">View Customer Purchases</a></li>
				<li><a href="question2.php">Products</a></li>
				<li><a href="question3.php">Create Buy Order</a></li>
				<li><a class="active" href="question4.php">Add Customer</a></li>
				<li><a href="question5.php">Update Phone</a></li>
        <li><a href="question6.php">Delete Customer</a></li>
			</ul>
		</div>

    <!-- Connects to HTML file with the database we are working with -->
    <?php
      include 'connectdb.php';
    ?>

    <!-- START OF 4) Inserting a new customer -->
    <form action="insertcustomer.php" method="post">

        <!-- Table to neatly organize the textboxes and labels for them -->
        <table>

        <!-- Generates new ID for the customer -->
        <?php
          include 'findcustomerid.php';

          # Prints the ID for the user to know when adding a new customer
          echo '<tr><td> ID: <td><b>' . $newID  . '</b>';
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
        <input type="submit" value="Add New Customer">
    </form>

  </body>
</html>
