<!--
  Author: Ivgeni Darinski
  Student NO.: 250920885
  Date Created: 2018-11-13
  File: question2and8.php
-->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="styling/defaultstyle.css" />
		<link rel="stylesheet" type="text/css" href="styling/question2and8.css" />
    <title>EBAY - Product Details</title>
  </head>
  <body>
    <!-- EBAY logo -->
    <img id="logo" src="images\logo.png">

		<!-- Allows navigation through website -->
		<div id="navigationBar">
			<ul>
        <li><a href="index.php">Home</a></li>
				<li><a href="question1.php">View Customer Purchases</a></li>
				<li><a class="active" href="question2and8.php">Products</a></li>
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

    <div id="wrapper">
      <div id="orderByContainer">
        <!-- Form to find products and order in a certain manner depicted by user -->
        <form action="getproducts.php" method="post">
          <p> ORDER PREFERENCES: </p>
          <!-- Allows user to select from ascending/descending orders through a selection bar -->
          <select name="order">
            <option value="ASC">Ascending</option>
            <option value="DESC">Descending</option>
          </select>

          <br>

          <!-- Radio buttons to select which attribute to order the products by -->
          <input type="radio" name="orderby" value="costperitem" checked="checked">ORDER BY PRICE<br>
          <input type="radio" name="orderby" value="description">ORDER BY NAME<br>
          <input id="submitStyle" type="submit" value = "Show Products">
          <hr>
        </form>
      </div>


      <div id="neverPurchasedContainer">
        <p>ITEMS NEVER PURCHASED: </p><br>
        <!-- Writes descriptions of products that were never purchased -->
        <?php
          # Query to find all products not in the list of purchased products
          $query = 'SELECT * FROM product WHERE prodid NOT IN (SELECT productid FROM productsold)';
          $result = mysqli_query($connection, $query);

          # Starts an unordered list
          echo '<ul>';
          # Loops through table and prints every product that hasn't been purchased yet
          while ($row = mysqli_fetch_assoc($result)) {
            echo '<li>' . $row["Description"] . '</li>';
          }
          # Ends the unordered list
          echo '</ul><br><hr>';
         ?>
     </div>
   </div>

   <!-- Beginning of 7) Asking user to prompt for a quantity which a product sales exceed -->
   <div id="quantityAnalysisContainer">
     <input type="text" name="quantity" placeholder="Quantity..">
   </div>

  </body>
</html>
