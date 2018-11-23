<?php
if (isset($_SESSION['uid'])) {
	$idUser = $_SESSION['uid']; 

	//Partie panier
	$requestData = $bdd->prepare('SELECT o.id as id, o.amount as amount, sum(op.quantity) as nbArticles from orders as o, order_products as op WHERE o.id=op.order_id and o.type="ORDER" and o.user_id=? GROUP BY o.id');
	$requestData->execute(array($_SESSION['uid']));
} else {
	$requestData = null;
}
?>