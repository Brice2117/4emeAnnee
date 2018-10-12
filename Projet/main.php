<!DOCTYPE html>
<html>
<head>
	<title>Nom Du Site</title>
	<link rel="stylesheet" href="css/styleNav.css"/>
	<link rel="stylesheet" href="css/styleHeader.css"/>
	<link rel="stylesheet" href="css/styleSearch.css"/>
</head>
<body>
	<?php include('header.php'); ?>
	<?php include('nav.php'); ?>
	<?php $reponseMain = $bdd->query('SELECT * from products');?>
	<div id = "block_search">
		<div>
			<h2>Welcome ! </h2>
			<?php for ($i=0;$i<min(10,$reponseMain->rowCount());$i++) {
				$donneeMain= $reponseMain->fetch();?>
				<a href="product.php?product=<?php echo $donneeMain['id']?>">
					<div class = "item">
						<div>
							<h3><?php echo $donneeMain['name']?></h3>
							<img src="pictures/<?php echo $donneeMain['picture']?>">
						</div>
						<p><?php echo $donneeMain['description_courte']?></p>
						<div>
							<p>PRIX : <?php echo $donneeMain['unit_price']?> €</p>
							<p>Stock : 10 </p>
						</div>
					</div>
				</a>
			<?php } ?>
		</div>
	</div>
</body>
</html>
