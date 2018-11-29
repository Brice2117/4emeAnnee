<?php 
//on regarde si l'utilisateur et bien connecté et si l'on a un identifient produit
if (isset($_SESSION['uid'])) {
	if (isset($_GET['product'])) {
		$productCode=$_GET['product'];

		//On regarde si l'utilisateur a déjà un panier en cours
		$commande = $bdd->query('SELECT * from orders where status = "CART" and type = "CART" and user_id="'.$_SESSION['uid'].'"');
		//on recupére le produit sélectionné
		$price = $bdd->query('SELECT * from products where id="'.$productCode.'"');
		$price = $price->fetch();
		

		if ($commande->rowCount()==0) {
			//Si l'utilisateur n'a pas de commande on récupère ses informations
			$user = $bdd->query('SELECT * from users where id="'.$_SESSION['uid'].'"');
			$user = $user->fetch();

			//On ajoute une ligne dans la liste des commandes
			$sql_1 = $bdd->query("INSERT  INTO orders (user_id,type,status,amount,billing_adress_id,delivery_adress_id)
            VALUES ('".$user['id']."','CART','CART','".$price['unit_price']."','".$user['billing_adress_id']."','".$user['delivery_adress_id']."')") ;

			//On va chercher l'id de la commande qu'on vient de créer
			$order = $bdd->query('SELECT * from orders where status = "CART" and type = "CART" and user_id="'.$user['id'].'"');
			$order = $order->fetch();

			//On met a jour la liste des produits dans la commande
            $sql_2 = $bdd->query("INSERT  INTO order_products (order_id,product_id,quantity,unit_price)
            VALUES ('".$order['id']."','".$productCode."','1','".$price['unit_price']."')") ;

		} else {
			//Si l'utilisateur a une commande en cours
			//On la met à jour
			$commande = $commande->fetch();
			$amount = $commande['amount'] + $price['unit_price'];
			$sql_3 = $bdd->prepare("UPDATE orders SET amount =? where id ='".$commande['id']."'");
			$sql_3->execute(array($amount));

			//On regarde si le produit et déjà dans le pinier
			$addProduct = $bdd->query('SELECT * from order_products where product_id="'.$price['id'].'" and order_id="'.$commande['id'].'" ');
			if ($addProduct->rowCount()==0) {
				//Si non, on ajoute le produit à la commande
				$sql_4 = $bdd->query("INSERT  INTO order_products (order_id,product_id,quantity,unit_price)
            	VALUES ('".$commande['id']."','".$productCode."','1','".$price['unit_price']."')") ;
			} else {
				//Si oui, on met à jour la quantité 
				$addProduct = $addProduct->fetch();
				$sql_5 = $bdd->query("UPDATE order_products SET quantity = quantity+1 where id ='".$addProduct['id']."'");
			}
		}
	}
	$page='cart_page';
	//On va sur le panier
} else {
	//Si l'utilisateur n'est pas connecté, on reste sur la page product
	$page='product';
}

?>