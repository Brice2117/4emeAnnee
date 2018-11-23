<?php 
$orderDisplay = false;
if (isset($_SESSION['uid'])) {
	$idUser = $_SESSION['uid'];

	//La page de cart_page va permettre d'afficher un panier en cours mais aussi le détails d'une commande déjà passé
	//order_id=9&ViewDetails=ViewDetails
	if (isset($_GET['order_id']) && isset($_GET['ViewDetails'])) {
		//partie chargeant les infos d'une commande pour orderDisplay
		$haveCart = null;
		$orderDisplay = true;
		$Cart = $bdd->query('SELECT o.id as order_line, p.id as product_id, quantity as Q, name, picture, description_courte, p.unit_price from order_products as o, products as p WHERE p.id = o.product_id and o.order_id = "'.$_GET['order_id'].'"');
		$montantCart = $bdd->query('SELECT SUM(o.quantity * p.unit_price) as montant from order_products as o, products as p WHERE p.id = o.product_id and o.order_id = "'.$_GET['order_id'].'"'); 
		$montant = $montantCart->fetch();

	} else {
		$reponseCart = $bdd->query('SELECT Count(id) from orders WHERE type="Cart" and user_id ="'.$idUser.'"');
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
	}
}
?>
