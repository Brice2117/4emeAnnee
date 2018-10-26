<?php 
if (isset($_SESSION['uid'])) {
	$idUser = $_SESSION['uid'];
}
?> 


<?php $reponseCart = $bdd->query('SELECT Count(id) from orders WHERE type="Cart" and user_id ="'.$idUser.'"');
$haveCart = $reponseCart->fetch()['Count(id)'];
if($haveCart == 0) {
	//On ne fait pas d'autres requêttes
 } 
 else {
 	 $Cart = $bdd->query('SELECT o.id as order_line, p.id as product_id, quantity as Q, name, picture, description_courte, p.unit_price from order_products as o, products as p WHERE p.id = o.product_id and o.order_id = (SELECT id from orders WHERE type="Cart" and user_id ="'.$idUser.'")');
  //information sur la commande en cours
 	 $montantCart = $bdd->query('SELECT SUM(o.quantity * p.unit_price) as montant from order_products as o, products as p WHERE p.id = o.product_id and o.order_id = (SELECT id from orders WHERE type="Cart" and user_id ="'.$idUser.'")'); 
	$montant = $montantCart->fetch();
} 
?>
