<?php  
	include ('dataBase.php');
if (isset($_GET['search'])) {
	$searchType="categorie";
	$searchCode=$_GET['search'];
	$reponseSearch = $bdd->query('SELECT * from products WHERE categorie_name ="'.$searchCode.'"');
			
} else if (isset ($_GET['searchBar'])) {
	$searchCode=$_GET['searchBar'];
	$searchType="searchBar";
	$reponseSearch = $bdd->query('SELECT * from products WHERE name LIKE "%'.$searchCode.'%"');
			
}else {
	include 'main.php';
	die;
}

?>

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

	<div id = "block_search">
		<div>
			<h2>Mots Cles : <?php echo $searchCode ?> </h2>
			
			<?php 
				for ($i=0;$i<$reponseSearch->rowCount();$i++) {
					$donneeSearch= $reponseSearch->fetch();?>
					<a href="product.php?product=<?php echo $donneeSearch['id']?>">
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
</body>
</html>
