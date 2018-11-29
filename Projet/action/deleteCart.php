<?php
if (isset($_SESSION['uid'])) {
	//On supprime tous les articles de la table order_products
	$delete = $bdd->prepare('DELETE FROM order_products WHERE order_id = (SELECT id from orders WHERE user_id = ? and type="Cart" and status="Cart")');
	$delete->execute(array($_SESSION['uid']));
	//on supprime la commande dans la table orders
	$delete = $bdd->prepare('DELETE FROM orders WHERE user_id = ? and type="Cart" and status="Cart"');
	$delete->execute(array($_SESSION['uid']));}
$page = "main";
?>