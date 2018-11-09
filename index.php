<!--
	Author: Ivgeni Darinski
	Student NO.: 250920885
	Date Created: 2018-11-07
	File: index.php
-->

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>EBAY</title>
		<link rel="stylesheet" type="text/css" href="index.css" />
	</head>
	<body>
		<!-- Connects to HTML file with the database we are working with -->
		<?php
			include 'connectdb.php';
		?>
		
		<h2> EBAY </h2>
		<h4> Select Customer to see what products they have purchased... </h4>
		
		<!-- 1) Allows you to see the products a specific customer has purchased -->
		<form action="getproductsold.php" method="post">

		<!-- 2) Allows the user to select the way purchased products by a customer are organized -->
		<p>ORDER PRODUCT BY:</p>
		<input type="radio" name="order" value="ASC" checked="checked">Ascending<br>
		<input type="radio" name="order" value="DESC">Descending<br><br>		

		<?php
			include 'selectcustomer.php';
		?>
		
		<input type="submit" value="Show Products">
		
		</form>		
	</body>
</html>
