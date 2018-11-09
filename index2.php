<!--
	Author: Ivgeni Darinski
	Student NO.: 250920885
	Date Created: 2018-11-09
	File: index2.php
-->

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>EBAY Products</title>
	</head>
	<body>
		<?php
			include 'connectdb.php';
		?>
		
		<h3>PRODUCTS</h3>
		
		<form action="getproducts.php" method="post">
		
		<select name="order">
			<option value="ASC">Ascending</option>
			<option value="DESC">Descending</option>
		</select>

		<hr>

		<input type="radio" name="orderby" value="costperitem" checked="checked">ORDER BY PRICE<br>
		<input type="radio" name="orderby" value="description">ORDER BY NAME<br>
		
		<input type="submit" value = "Show Products">
		
		</form>
	</body>
</html>
