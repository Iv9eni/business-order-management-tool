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
    <link rel="stylesheet" type="text/css" href="styling/question9.css" />
    <script src="scripts\displaySummary.js"></script>

    <title>EBAY - Order Summarys</title>
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

    <!-- Wrap the contents of the HTML file for styling -->
    <div id="wrapper">

      <!-- Gives user instructions on what the functionality of this page is -->
      <p style='font-family: "Courier";'> PRODUCTS </p>

      <!-- Selecting a product to see its order summary -->
      <form action="#" method="post">

        <!-- Select statement to display the different products -->
        <select name="products">

          <!-- Start of creating products as options for dropdown -->
          <?php
            # Query's to find the products you can select from
            $findProductsQuery = 'SELECT * FROM product';
            $result = mysqli_query($connection, $findProductsQuery);

            # Loops through all the rows in our query
            while ($product_row = mysqli_fetch_assoc($result)) {
              echo '<option value=' . $product_row["ProdID"] . '>' . $product_row["ProdID"] . ': ' . $product_row["Description"] . '</option>';
            }

            # End of select statement
            echo '</select>';
         ?>

         <input type="submit" name="submit" value="Get Statement">
      </form>

      <?php
         # Checks if the submit button was clicked
         if (isset($_POST["submit"])) {

           # Stores the productID chosen by user and sums the quantitys bought of products
           $productSelect = $_POST["products"];

           # Gets the total amount of product purchased
           $queryTotal = 'SELECT SUM(quantity) AS totalsold FROM productsold WHERE productid=' . $productSelect . ' GROUP BY productid';
           $totalResult = mysqli_query($connection, $queryTotal);
           $totalSold = mysqli_fetch_assoc($totalResult);

           # Gets the information on the product selected
           $productQueryTxt = 'SELECT * FROM product WHERE prodid=' . $productSelect;
           $productQuery = mysqli_query($connection, $productQueryTxt);
           $product = mysqli_fetch_assoc($productQuery);

           # Calculates the total cost of products purchased
           $totalCost = $product["CostPerItem"] * $totalSold["totalsold"];

         }
      ?>

      <ul id="summaryTable">
        <li><label for="id">Product ID:</label> <?php echo $productSelect; ?></li>
        <li><label for="name">Product Name:</label> <?php echo $product["Description"]; ?></li>
        <li><label for="cost">Cost Per Item: $</label> <?php echo $product["CostPerItem"]; ?></li>
        <li><label for="totalsold">Amount Sold:</label> <?php echo $totalSold["totalsold"]; ?></li>
        <li><label for="totalcosts">Total Costs: $</label> <?php echo $totalCost; ?></li>
      </ul>

    </div>

  </body>
</html>
