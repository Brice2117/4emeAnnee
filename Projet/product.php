<!DOCTYPE html>
<html>
<head>
	<title>Nom du produit</title>
	<link rel="stylesheet" href="css/styleNav.css"/>
	<link rel="stylesheet" href="css/styleHeader.css"/>
	<link rel="stylesheet" href="css/styleProducte.css"/>
</head>
<body>
	<div class="header">
		<?php include('header.php'); ?>
		<?php include('nav.php'); ?>
	</div>

	<div id="block_product">
	<div class="page">
		<a class="retour" href="#">Retour aux résultats</a>
		<section>
			<aside>
				<a href="#"><img id="img_product" src="pictures/product.jpg" title="Zoom"></a>
			</aside>
			<article>
				<div class="description">
					<h1>Daxton Protection Anti-calcaire Interieur et Exterieur</h1>
					<p>description du produit bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla </p>
				</div>
				<div class="price">
					<h1>40€00</h1>
					<form method="GET">
						<input type="button" name="buy" value="Ajouter au panier">
					</form>
				</div>
			</article>
		</section>
		<div class="prop">
				<a href="product.php"><img class="img_prop" src="pictures/computer.png"><p>PC Bureau</p></a>
				<a href="product.php"><img class="img_prop" src="pictures/electronic.png"><p>Four à micro-ondes</p></a>
				<a href="product.php"><img class="img_prop" src="pictures/toy.png"><p>Manette du jeu vidéo</p></a>
				<a href="product.php"><img class="img_prop" src="pictures/sport.png"><p>casque de moto</p></a>
				<a href="product.php"><img class="img_prop" src="pictures/tool.png"><p>Des beaux outils</p></a>
			</div>
		</div>
	</div>
</body>
</html>