<?php  
if (isset($_GET['product'])) {
	$productCode=$_GET['product'];
} else {
	include 'main.php';
	die;
}
?>

<?php $reponseProduct = $bdd->query('SELECT * from products WHERE id ="'.$productCode.'"');
	$donneeProduct = $reponseProduct->fetch();
	$productCategorie = $donneeProduct['categorie_name'];
	$productImage = $donneeProduct['picture'];
	$productName = $donneeProduct['name'];
	$descriptionLongue = $donneeProduct['description_longue'];
	$productPrice = $donneeProduct['unit_price'];

	$reponseProduct2 = $bdd->query('SELECT * from products WHERE categorie_name ="'.$donneeProduct['categorie_name'].'"');

?>