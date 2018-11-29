<?php  

if (isset($_GET['search'])) {
	//variable pour savoir quel'on a cliqué sur une catégorie
	$searchType="categorie";
	//on récupère tous les produits qui sont dans la catégorie sélectionnée
	$searchCode=$_GET['search'];
	$reponseSearch = $bdd->query('SELECT * from products WHERE categorie_name ="'.$searchCode.'"');
			
} else if (isset ($_GET['searchBar'])) {
	//variable pour savoir que l'on a fait une recherche par mot clé
	$searchType="searchBar";
	//On récupère tous les produits qui contienent les caractères saisies]
	$searchCode = $_GET['searchBar'];
	$reponseSearch = $bdd->query('SELECT * from products WHERE name LIKE "%'.$searchCode.'%"');
			
}else {
	//sinon on recharge la page principale
	include 'index.php';
	die;
}

?>