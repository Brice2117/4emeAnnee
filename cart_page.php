<!DOCTYPE html>
<html>
<head>
	<title>e-commerce.com</title>
	<link rel="stylesheet" href="css/styleNav.css"/>
	<link rel="stylesheet" href="css/styleHeaderr.css"/>
	<link rel="stylesheet" href="cart_page.css"/>
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
						<td name="product" colspan="2"> <div class ="theader">Product</div></td>
						<td name="price">  Price  </td>
						<td>  </td>
						<td name="quantity">  Quantity  </td>
					</tr>
				</theader>
				<tbody>
					<tr>
						<td name="picture"><img src="pictures/computer.png" style="	max-height: 150px; max-width: 250px;"></td>
						<td name="product">Ecran de PC</td>
						<td name="price">79 $</td>
						<td>  </td>
						<td name=quantity>13</td>
					</tr>
					<tr>
						<td name="picture"><img src="pictures/food.png" style="	max-height: 150px; max-width: 250px;"></td>
						<td name="product">Set Gourmandise Deluxe</td>
						<td name="price">23</td>
						<td>  </td>
						<td name="quantity">24</td>
					</tr>
					<tr>
						<td name="picture"><img src="pictures/toy.png" style="max-height: 150px; max-width: 250px;"></td>
						<td name="product">Manette Xbox One</td>
						<td name="price">32</td>
						<td>  </td>
						<td name="quantity"> Y</td>
					</tr>
					<tr>
						<td name="picture"><img src="pictures/sport.png" style="max-height: 150px; max-width: 250px;"></td>
						<td name="product">Casque de Moto</td>
						<td name="price">41</td>
						<td>  </td>
						<td name="quantity">42</td>
					</tr>
				</tbody>
				<tfoot>
					<td colspan="5" style="background-color:rgb(67,163,220); border-radius: 0px 0px 5px 5px; max-height: 30px;"><h3>Total : 356 $</h3></td>
				</tfoot>
			</table>
			<div class="check">
				<form method="Get">
				<a>
					<input type="button" name="cancel" value="Cancel" style="border-radius: 5px 5px 5px 5px; background-color: rgb(67,163,220); min-height: 50px; min-width: 150px; font-size:18px; margin-top: 30px; margin-bottom: 50px; margin-left: 50px; margin-right:50px;">
					<input type="button" name="check" value="Check your Cart" style="border-radius: 5px 5px 5px 5px; background-color: rgb(67,163,220); min-height: 50px; min-width: 150px; font-size:18px; margin-top: 30px; margin-bottom: 50px; margin-left: 50px; margin-right:50px;">
				</a>
				</form>
			</div>
	</div>
</body>
</html>