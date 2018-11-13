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
		<link rel="stylesheet" type="text/css" href="defaultstyle.css" />
    <title>EBAY - Customer Purchases</title>
  </head>
  <body>

    <img src="logo.png" width="100" height="60">

		<!-- Allows navigation through website -->
		<div id="navigationBar">
			<ul>
        <li><a href="index.php">Home</a></li>
				<li><a href="question1.php">1</a></li>
				<li><a href="question2.php">2</a></li>
				<li><a href="question3.php">3</a></li>
				<li><a href="question4.php">4</a></li>
				<li><a href="question5.php">5</a></li>
			</ul>
		</div>

		<br><br>

    <!-- Connects to HTML file with the database we are working with -->
    <?php
      include 'connectdb.php';
    ?>

    <!-- 1) Allows you to see the products a specific customer has purchased -->
    <form action="getproductsold.php" method="post">

      <!-- Allows the user to select the way purchased products by a customer are organized -->
      <input type="radio" name="order" value="ASC" checked="checked">Ascending<br>
      <input type="radio" name="order" value="DESC">Descending<br><br>

      <!-- Shows all the customers user may select from -->
      <?php
        include 'selectcustomer.php';
      ?>

      <!-- Button for user to accept all values of search and search the products purchased by customer -->
      <input type="submit" value="Show Purchased Products">

    </form>
  </body>
</html>
