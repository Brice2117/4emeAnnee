<?php  
//on verifie que l'on a l'id du prduit à afficher
if (isset($_GET['product'])) {
	$productCode=$_GET['product'];
} else {
	include 'main.php';
	die;
}
?>

<?php 
	//On récupère les informations du produit à afficher
	$reponseProduct = $bdd->query('SELECT * from products WHERE id ="'.$productCode.'"');
	$donneeProduct = $reponseProduct->fetch();
	//On creer des variables avec les informations du produit pour les utiiser plus facilement
	$productCategorie = $donneeProduct['categorie_name'];
	$productImage = $donneeProduct['picture'];
	$productName = $donneeProduct['name'];
	$descriptionLongue = $donneeProduct['description_longue'];
	$productPrice = $donneeProduct['unit_price'];

	//On récupère les produits de la même catégorie pour afficher 5 produits similaires
	$reponseProduct2 = $bdd->query('SELECT * from products WHERE categorie_name ="'.$donneeProduct['categorie_name'].'"');

?>