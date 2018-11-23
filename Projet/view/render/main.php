<div id = "block_main">
	<div class="texte">
		<img src="pictures/wallpaper.jpg">
		<h1> Bienvenue ! </h1>
		<p>	Profitez des offres sur tous les costumes ! </p>
	</div>
	<p>Produits récemment consultés</p>
	<div class="prop">
		<?php  
		//on affiche les 5 produits dernièrement consulté s'ils existent
		for($i=0;$i<sizeof($array);$i++){
			$prod = $reponseProduct2 -> fetch(); ?>
			<a href="index.php?page=product&product=<?php echo $prod['id']?>"">
			<img class="img_prop" src="pictures/<?php echo $prod['picture']?>">
			<p><?php echo $prod['name']?></p></a>
		<?php } ?>
	</div>

	<div class="credit">
		<p>Site réalisé par : Pezeril Maxime, Simeu Brice, Patard Pierre et Vincent Varlet</p>
		<p>2018-2019</p>
		<p>Promo 61</p>
	</div>
</div>