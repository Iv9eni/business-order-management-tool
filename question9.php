<!--
  Author: Ivgeni Darinski
  Student NO.: 250920885
  Date Created: 2018-11-13
  File: question6.php
-->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="styling/defaultstyle.css" />
    <title>EBAY - Delete Customer</title>
  </head>
  <body>
    <!-- EBAY logo -->
    <img id="logo" src="images\logo.png">

		<!-- Allows navigation through website -->
		<div id="navigationBar">
			<ul>
        <li><a href="index.php">Home</a></li>
				<li><a href="question1.php">View Customer Purchases</a></li>
				<li><a href="question2and8.php">Products</a></li>
				<li><a href="question3.php">Create Buy Order</a></li>
				<li><a href="question4.php">Add Customer</a></li>
				<li><a href="question5.php">Update Phone</a></li>
        <li><a href="question6.php">Delete Customer</a></li>
        <li><a class="active" href="question9.php">Order Summary</a></li>
			</ul>
		</div>

    <!-- Connects to HTML file with the database we are working with -->
    <?php
      include 'connectdb.php';
    ?>

    <form action="calculateOrderSummary" method="post">
    </form>

  </body>
</html>
