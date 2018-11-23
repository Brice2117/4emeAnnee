<?php
	if(isset($_SESSION['uid']) && isset($_GET['check'])) 
	{
		//Dans ce cas, l'utilisateur est connecté
		if ($_GET['check']='Valide Cart'){
			//Il a bien appuyé sur le bouton pour valider le panier
			$orderIdRequest = $bdd->prepare('SELECT id from orders WHERE user_id=? and type="Cart" and status="Cart"');
			$orderIdRequest->execute(array($_SESSION['uid']));
			$orderId = $orderIdRequest->fetch()['id'];
			$update = $bdd->prepare("UPDATE orders SET type=?, status=? WHERE id= ?");
			$update->execute(array("ORDER", "BILLED",$orderId));
			$page='cart_page';
		}
	} else {
		$page='confirm_cart';
	}
?>