<?php
if (isset($_SESSION['uid'])) {
	//L'utilisateur est bien connecté, on peut apporter des modifications à son panier


	if (isset($_GET['id_produit'])) {
		//On peut mettre à jour la commande (on a toutes les informations nécessaire)
		//On regarde si la suppression du produit n'entraine pas la supression de la commande
		$request = $bdd->prepare('SELECT count(op.product_id) as nbOtherProduct from order_products as op, orders as o  WHERE op.product_id <> ? and o.id = op.order_id and o.id=(SELECT id from orders WHERE user_id = ? and type="Cart" and status="Cart")');
		$request->execute(array($_GET['id_produit'], $_SESSION['uid']));

		if ($request->fetch()['nbOtherProduct'] == 0) {
			//Dans ce cas, la supression du produit entraîne la supression de la commande
			//On supprime dans un premier les infos dans la table order_product car pour cela, on a besoin des infos dans la table orders
			$delete = $bdd->prepare('DELETE FROM order_products WHERE order_id = (SELECT id from orders WHERE user_id = ? and type="Cart" and status="Cart")');
			$delete->execute(array($_SESSION['uid']));
			$delete = $bdd->prepare('DELETE FROM orders WHERE user_id = ? and type="Cart" and status="Cart"');
			$delete->execute(array($_SESSION['uid']));
		}else {
			//Dans ce cas, il faut faire la supression dans la table order_products
			$delete = $bdd->prepare('DELETE FROM order_products WHERE order_id = (SELECT id from orders WHERE user_id = ? and type="Cart" and status="Cart") and product_id = ?');
			$delete->execute(array($_SESSION['uid'], $_GET['id_produit']));
			//Et on met à jour le montant du panier dans orders
			//On recalcule le montant
		 	$requestMontant = $bdd->prepare('SELECT SUM(o.quantity * p.unit_price) as montant from order_products as o, products as p WHERE p.id = o.product_id and o.order_id = (SELECT id from orders WHERE type="Cart" and user_id =?)');
			$requestMontant->execute(array($_SESSION['uid']));
			$montantCart = $requestMontant->fetch()['montant'];
			//On l'update!
			$update = $bdd->prepare('UPDATE orders SET amount=? WHERE type="Cart" and user_id=?');
			$update->execute(array($montantCart, $_SESSION['uid']));
		}
	}
}
$page = "cart_page";
?>