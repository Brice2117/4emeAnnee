<?php  
$idUser=1;
if (isset($_GET['product'])) {
	$productCode=$_GET['product'];
} else {
	include 'main.php';
	die;
}

?>
<?php include('dataBase.php'); ?>
<?php $reponseProduct = $bdd->query('SELECT * from products WHERE id ="'.$productCode.'"');
	$donneeProduct = $reponseProduct->fetch();
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $donneeProduct['name'] ?></title>
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
		<a class="retour" href="search.php?search=<?php echo $donneeProduct['categorie_name']?>">Retour a la categorie <?php echo $donneeProduct['categorie_name']?></a>
		<section>
			<aside>
				<a href="#"><img id="img_product" src="pictures/<?php echo $donneeProduct['picture'] ?>" title="Zoom"></a>
			</aside>
			<article>
				<div class="description">
					<h1><?php echo $donneeProduct['name']?></h1>
					<p><?php echo $donneeProduct['description_longue']?></p>
				</div>
				<div class="price">
					<h1><?php echo $donneeProduct['unit_price']?> €</h1>
					<form method="GET" action="">
						<input type="button" name="buy" value="Ajouter au panier">
					</form>
				</div>
			</article>
		</section>
		<div class="prop">
			<?php 
			$cat_name=$donneeProduct['categorie_name'];
			$reponseProduct2 = $bdd->query('SELECT * from products WHERE categorie_name ="'.$donneeProduct['categorie_name'].'"');
				for ($i=0;$i<min($reponseProduct2->rowCount(),5);$i++) {
					$donneeProduct2= $reponseProduct2->fetch();
					if ($donneeProduct2['name'] != $donneeProduct['name']) {
					?>				

				<a href="product.php?product=<?php echo $donneeProduct2['id']?>""><img class="img_prop" src="pictures/<?php echo $donneeProduct2['picture']?>"><p><?php echo $donneeProduct2['name']?></p></a>
				<?php } } ?>
			</div>
		</div>
	</div>
</body>
</html>