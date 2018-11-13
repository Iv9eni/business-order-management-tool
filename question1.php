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
    <img id="logo" src="logo.png" width="420" height="90">

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
			</ul>
		</div>

    <!-- Connects to HTML file with the database we are working with -->
    <?php
      include 'connectdb.php';
    ?>


    <!-- 1) Allows you to see the products a specific customer has purchased -->
    <form action="getproductsold.php" method="post">
      <div id="organizebuttons">
        <!-- Allows the user to select the way purchased products by a customer are organized -->
        <input type="radio" name="order" value="ASC" checked="checked">Ascending<br>
        <input type="radio" name="order" value="DESC">Descending<br><br>
      </div>

      <div id="customers">
        <!-- Shows all the customers user may select from -->
        <?php
          include 'selectcustomer.php';
        ?>
      </div>

      <!-- Button for user to accept all values of search and search the products purchased by customer -->
      <input type="submit" value="Show Purchased Products">

    </form>
  </body>
</html>
