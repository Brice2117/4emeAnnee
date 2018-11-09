<?php
if (isset($_SESSION['uid'])) {
	//L'utilisateur est bien connecté, on peut apporter des modifications à son panier
	if (isset($_GET['id_produit']) && isset($_GET['quantity'])) {
		//On update la commande
		if ($_GET['quantity'] == 0) {
			//On supprime la ligne
			$delete = $bdd->prepare('DELETE FROM order_products WHERE order_id=(SELECT id from orders WHERE type="Cart" and user_id=?) and product_id=?');
			$delete->execute(array($_SESSION['uid'], $_GET['id_produit']));
		}
		else{
			//On change la quantité
			$update = $bdd->prepare('UPDATE order_products SET quantity=? WHERE order_id=(SELECT id from orders WHERE type="Cart" and user_id=?) and product_id=?');
			$update->execute(array($_GET['quantity'], $_SESSION['uid'], $_GET['id_produit']));
		}
		//Par la suite, il faut mettre à jour la table orders en supprimant le panier s'il ne reste plus aucun produit ou en mettant à jour son montant!
		$requestNbArticles = $bdd->prepare('SELECT sum(quantity) as sum from order_products WHERE order_id =(SELECT id from orders WHERE type="Cart" and user_id =?)');
		$requestNbArticles->execute(array($_SESSION['uid']));
		$nbArticles = $requestNbArticles->fetch()['sum'];
		if ($nbArticles == 0) {
			//Il ne reste plus aucun article, on supprime la commande
			$delete = $bdd->prepare('DELETE FROM orders WHERE type="Cart" and user_id=?');
			$delete->execute(array($_SESSION['uid']));
		}
		else {
			//On recalcule le montant
		 	$requestMontant = $bdd->prepare('SELECT SUM(o.quantity * p.unit_price) as montant from order_products as o, products as p WHERE p.id = o.product_id and o.order_id = (SELECT id from orders WHERE type="Cart" and user_id =?)');
			$requestMontant->execute(array($_SESSION['uid']));
			$montantCart = $requestMontant->fetch()['montant'];
			//On l'update!
			$update = $bdd->prepare('UPDATE orders SET amount=? WHERE type="Cart" and user_id=?');
			$update->execute(array($montantCart, $_SESSION['uid']));
		}
	}
	else {
		//On ne fait rien
	}
}
else {
	//On ne fait rien
}
$page='cart_page';
//On retourne sur le panier!
?>