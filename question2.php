<!--
  Author: Ivgeni Darinski
  Student NO.: 250920885
  Date Created: 2018-11-13
  File: question2.php
-->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="defaultstyle.css" />
    <title>EBAY - Products</title>
  </head>
  <body>
    <!-- EBAY logo -->
    <img src="logo.png" width="250" height="90">

		<!-- Allows navigation through website -->
		<div id="navigationBar">
			<ul>
        <li><a href="index.php">Home</a></li>
				<li><a href="question1.php">1</a></li>
				<li><a href="question2.php">2</a></li>
				<li><a href="question3.php">3</a></li>
				<li><a href="question4.php">4</a></li>
				<li><a href="question5.php">5</a></li>
        <li><a href="question6.php">6</a></li>
			</ul>
		</div>

		<br><br>

    <!-- Connects to HTML file with the database we are working with -->
    <?php
      include 'connectdb.php';
    ?>

    <!-- Form to find products and order in a certain manner depicted by user -->
    <form action="getproducts.php" method="post">

      <!-- Allows user to select from ascending/descending orders through a selection bar -->
      <select name="order">
        <option value="ASC">Ascending</option>
        <option value="DESC">Descending</option>
      </select>

      <!-- Line break for style B) -->
      <hr>

      <!-- Radio buttons to select which attribute to order the products by -->
      <input type="radio" name="orderby" value="costperitem" checked="checked">ORDER BY PRICE<br>
      <input type="radio" name="orderby" value="description">ORDER BY NAME<br>

      <input type="submit" value = "Show Products">

    </form>
  </body>
</html>
