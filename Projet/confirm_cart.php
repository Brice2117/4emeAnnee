<!DOCTYPE html>
<html>
<head>
	<title>e-commerce.com</title>
	<link rel="stylesheet" href="css/styleNav.css"/>
	<link rel="stylesheet" href="css/styleHeader.css"/>
	<link rel="stylesheet" href="css/confirm_cart.css"/>
</head>
<body>

	<?php include('dataBase.php'); ?>
	<?php include('header.php'); ?>
	<?php include('nav.php'); ?>

	<div id="confirm_cart">

		<h5 style="text-align: center;">Validation de votre commande</h5>

		<a href="cart_page.php">
		<div class="recap_commande">
			<table>
				<thead>
					<td> Nombre d'articles </td>
					<td> Montant total </td>
				</thead>
				<tbody>
					<td></td>
					<td></td>
				</tbody>
			</table>
		</div>
		</a>

		<div class="adress">
			<?php $reponseCart = $bdd->query('SELECT ');?>
		</div>

		<div class="adress">
		</div>

	</div>
</body>
</html>