<div id="block_product">
<div class="page">
	<a class="retour" href="index.php?page=Search&search=<?php echo $productCategorie?>">Retour a la categorie <?php echo $productCategorie ?></a>
	<section>
		<aside>
			<img id="img_product" src="pictures/<?php echo $productImage  ?>">
		</aside>
		<article>
			<div class="description">
				<h1><?php echo $productName ?></h1>
				<p><?php echo $descriptionLongue ?></p>
			</div>
			<div class="price">
				<h1><?php echo $productPrice ?> €</h1>
				<form method="GET" action="index.php">
					<input type="hidden" name="page" value="addToCart">
					<input type="hidden" name="product" value="<?php echo $donneeProduct['id'] ?>">
					<input type="submit" name="buy" value="Ajouter au panier">
				</form>
			</div>
		</article>
	</section>
	<div class="prop">

		<?php 
			for ($i=0;$i<min($reponseProduct2->rowCount(),5);$i++) {
				$donneeProduct2= $reponseProduct2->fetch();
				if ($donneeProduct2['name'] != $productName) {
		?>				

			<a href="index.php?page=product&product=<?php echo $donneeProduct2['id']?>""><img class="img_prop" src="pictures/<?php echo $donneeProduct2['picture']?>"><p><?php echo $donneeProduct2['name']?></p></a>
			<?php } } ?>
		</div>
	</div>
</div>
