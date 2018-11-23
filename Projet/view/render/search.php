<div id = "block_search">
	<div>
		<h2>Mots Cles : <?php echo $searchCode ?> </h2>
		
		<?php 
			for ($i=0;$i<$reponseSearch->rowCount();$i++) {
				$donneeSearch= $reponseSearch->fetch();?>
				<a href="index.php?page=product&product=<?php echo $donneeSearch['id']?>">
					<div class = "item">
						<div>
							<h3><?php echo $donneeSearch['name'] ?></h3>
							<img src="pictures/<?php echo $donneeSearch['picture'] ?>">
						</div>
						<p><?php echo $donneeSearch['description_courte'] ?></p>
						<div>
							<p><?php echo $donneeSearch['unit_price'] ?> €</p>
							<p>Stock : OK </p>
						</div>
					</div>
				</a>
		<?php } ?>
	</div>
</div>

