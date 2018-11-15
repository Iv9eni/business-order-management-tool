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

    <!-- Wrap the contents of the HTML file for styling -->
    <div id="wrapper">

      <!-- Selecting a product to see its order summary -->
      <form action="calculateOrderSummary" method="post">

        <!-- Select statement to display the different products -->
        <select name="products">

          <!-- Start of creating products as options for dropdown -->
          <?php
            # Query's to find the products you can select from
            $findProductsQuery = 'SELECT * FROM product';
            $result = mysqli_query($connection, $findProductsQuery);

            # Loops through all the rows in our query
            while ($product_row = mysqli_fetch_assoc($result)) {
              echo '<option value=' . $product_row["ProdID"] . '>' . $product_row["Description"] . '</option>';
            }

            # End of select statement
            echo '</select>';
           ?>

      </form>



    </div>

  </body>
</html>
