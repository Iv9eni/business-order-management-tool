<!--
  Author: Ivgeni Darinski
  Student NO.: 250920885
  Date Created: 2018-11-13
  File: question1.php
-->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="styling/defaultstyle.css" />
    <link rel="stylesheet" type="text/css" href="styling/question1.css" />
    <title>EBAY - Customer Purchases</title>
  </head>
  <body>
    <!-- EBAY logo on every site -->
    <img id="logo" src="images\logo.png">

		<!-- Allows navigation through website -->
		<div id="navigationBar">
			<ul>
        <li><a href="index.php">Home</a></li>
				<li><a class="active" href="question1.php">View Customer Purchases</a></li>
				<li><a href="question2and8.php">Products</a></li>
				<li><a href="question3.php">Create Buy Order</a></li>
				<li><a href="question4.php">Add Customer</a></li>
				<li><a href="question5.php">Update Phone</a></li>
        <li><a href="question6.php">Delete Customer</a></li>
        <li><a href="question9.php">Order Summary</a></li>
			</ul>
		</div>

    <!-- Connects to HTML file with the database we are working with -->
    <?php
      include 'connectdb.php';
    ?>
    <!-- 1) Allows you to see the products a specific customer has purchased -->
    <form action="#" method="post">

        <!-- Neatly stack elements -->
        <div id="customers">
          <!-- Shows all the customers user may select from -->
          <?php
            include 'selectcustomer.php';
          ?>
        </div>

        <!-- Div to organize all the buttons needed for ordering the products-->
        <div id="organizebuttons">
          <!-- Allows the user to select the way purchased products by a customer are organized -->
          <input type="radio" name="order" value="ASC" checked="checked">Ascending<br>
          <input type="radio" name="order" value="DESC">Descending<br>
        </div>

        <!-- Button for user to accept all values of search and search the products purchased by customer -->
        <input type="submit" name="submit" value="Show Purchased Products" id="submit"><br><hr><br>
    </form>

    <!-- To group all the items purchased by the customer -->
    <div id="purchasedListContainer">

      <p style="margin: 10px auto 10px auto"> PRODUCTS PURCHASED </p>

      <ul>
        <?php
          # Checks if the submit button was clicked
          if (isset($_POST["submit"])) {
            # Initializes the variable with the customer id that was selected in the index page and runs a query to find their purchased products
            $selectedID = (string)$_POST["customers"];
            $query = 'SELECT fname, description FROM productsold INNER JOIN product ON productid=prodid INNER JOIN customer ON purchaserid=customerid WHERE customerid="' . $selectedID . '" ORDER BY description ' . $_POST["order"];

            # Checks if the user selected a value
            if ($selectedID == NULL) {
              echo '<p>ERROR1: No Customer Selected</p>';
            }

            # Runs the query and sets it to a variable
            $result = mysqli_query($connection, $query);

            # Checks to see if the query was completed successfully
            if (!$result) {
              die("Query To Find Customers Purchased Products Failed!");
            }

            # Loops through each row in the query
            while ($row = mysqli_fetch_assoc($result)) {
              echo '<li style="padding: 5px">' . $row["description"] . '</li>';
            }
            mysqli_free_result($result);
          }
        ?>
      </ul>
    </div>

  </body>
</html>
