<?php 
if (isset($_SESSION['uid'])) {
	if (isset($_GET['product'])) {
		$productCode=$_GET['product'];

		$commande = $bdd->query('SELECT * from orders where status = "CART" and type = "CART" and user_id="'.$_SESSION['uid'].'"');
		$price = $bdd->query('SELECT * from products where id="'.$productCode.'"');
		$price = $price->fetch();
		
		if ($commande->rowCount()==0) {
			

			$user = $bdd->query('SELECT * from users where id="'.$_SESSION['uid'].'"');
			$user = $user->fetch();

			//On ajoute une ligne dans la liste des commandes
			$sql_1 = $bdd->query("INSERT  INTO orders (user_id,type,status,amount,billing_adress_id,delivery_adress_id)
            VALUES ('".$user['id']."','CART','CART','".$price['unit_price']."','".$user['billing_adress_id']."','".$user['delivery_adress_id']."')") ;

			//On va chercher l'id de la commande qu'on vient de créer
			$order = $bdd->query('SELECT * from orders where status = "CART" and type = "CART" and user_id="'.$user['id'].'"');
			$order = $order->fetch();


            $sql_2 = $bdd->query("INSERT  INTO order_products (order_id,product_id,quantity,unit_price)
            VALUES ('".$order['id']."','".$productCode."','1','".$price['unit_price']."')") ;

		} else {

			$commande = $commande->fetch();
			$amount = $commande['amount'] + $price['unit_price'];
			$sql_3 = $bdd->prepare("UPDATE orders SET amount =? where id ='".$commande['id']."'");
			$sql_3->execute(array($amount));

			$addProduct = $bdd->query('SELECT * from order_products where product_id="'.$price['id'].'" and order_id="'.$commande['id'].'" ');

			if ($addProduct->rowCount()==0) {
				$sql_4 = $bdd->query("INSERT  INTO order_products (order_id,product_id,quantity,unit_price)
            	VALUES ('".$commande['id']."','".$productCode."','1','".$price['unit_price']."')") ;
			} else {
				$addProduct = $addProduct->fetch();
				$sql_5 = $bdd->query("UPDATE order_products SET quantity = quantity+1 where id ='".$addProduct['id']."'");
			}
		}
	}
	$page='cart_page';
//On va sur le panier
} else {
	$page='product';
}

?>