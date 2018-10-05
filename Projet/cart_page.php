<!DOCTYPE html>
<html>
<head>
	<title>e-commerce.com</title>
	<link rel="stylesheet" href="css/styleNav.css"/>
	<link rel="stylesheet" href="css/styleHeader.css"/>
	<link rel="stylesheet" href="css/cart_page.css"/>
	<style>
		#cart_page tbody tr:nth-child(even) {background-color: rgb(82,183,242);}
		#cart_page tbody tr:nth-child(odd) {background-color:  rgb(52,143,198);}
	</style>
</head>
<body>

	<?php include('header.php'); ?>
	<?php include('nav.php'); ?>

	<div id="cart_page">
		<h1>Shopping Cart</h1>
				<table>
				<theader>
					<tr id="theader" style="background-color:rgb(67,163,220);">
						<td name="product" colspan="2" style="border-radius: 5px 0px 0px 0px;"> <div class ="theader">Product</div></td>
						<td name="price">  Price  </td>
						<td>  </td>
						<td name="quantity" style="border-radius: 0px 5px 0px 0px;">  Quantity  </td>
					</tr>
				</theader>
				<tbody>
					<tr>
						<td><img src="pictures/computer.png"></td>
						<td><div class="product">Ecran de PC</div></td>
						<td><div class="price">79 $</div></td>
						<td>  </td>
						<td name=quantity><form><input class="quantity" type="number" min="0" value="1"></form></td>
					</tr>
					<tr>
						<td><img src="pictures/food.png"></td>
						<td><div class="product">Set Gourmandise Deluxe</div></td>
						<td><div class="price">79 $</div></td>
						<td>  </td>
						<td name="quantity"><form><input class="quantity" type="number" min="0" value="1"></form></td>
					</tr>
					<tr>
						<td><img src="pictures/toy.png"></td>
						<td><div class="product">Manette Xbox One</div></td>
						<td><div class="price">79 $</div></td>
						<td>  </td>
						<td name="quantity"><form><input class="quantity" type="number" min="0" value="1"></form></td>
					</tr>
					<tr>
						<td><img src="pictures/sport.png"></td>
						<td><div class="product">Casque de Moto</div></td>
						<td><div class="price">79 $</div></td>
						<td>  </td>
						<td name="quantity"><form><input class="quantity" type="number" min="0" value="1"></form></td>
					</tr>
				</tbody>
				<tfoot>
					<td colspan="5" style="background-color:rgb(67,163,220); border-radius: 0px 0px 5px 5px; max-height: 30px;"><h3>Total : 356 $</h3></td>
				</tfoot>
			</table>
			<div class="check">
				<form method="Get">
				<a>
					<input type="button" name="cancel" value="Cancel" class="bouton">
					<input type="button" name="check" value="Check your Cart" class="bouton">
				</a>
				</form>
			</div>
	</div>
</body>
</html>