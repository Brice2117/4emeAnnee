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
	include 'index.php';
	die;
}

?>