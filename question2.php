<!--
  Author: Ivgeni Darinski
  Student NO.: 250920885
  Date Created: 2018-11-13
  File: productinformation.php
-->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="defaultstyle.css" />
    <title>Product Information</title>
  </head>
  <body>

    <img src="logo.png" width="100" height="60">

		<!-- Allows navigation through website -->
		<div id="navigationBar">
			<ul>
				<li><a href="index.php">1</a></li>
				<li><a href="question2.php">2</a></li>
				<li><a href="">3</a></li>
				<li><a href="">4</a></li>
				<li><a href="">5</a></li>
			</ul>
		</div>

		<br><br>

    <!-- Connects to HTML file with the database we are working with -->
    <?php
      include 'connectdb.php';
    ?>

    <!-- Start of 2) -->
    <h3>OUR PRODUCTS</h3>
    <p>Product Ordering Options:</p>

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