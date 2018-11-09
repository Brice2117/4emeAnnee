
<?php
$idUser = $_SESSION['uid']; 
$idUserCart = $_SESSION['uid'];
//Partie panier
$nbArticles = $bdd->query('SELECT sum(quantity) as sum from order_products WHERE order_id =(SELECT id from orders WHERE type="Cart" and user_id ="'.$idUserCart.'")')->fetch()['sum'];
$montantCart = $bdd->query('SELECT SUM(o.quantity * p.unit_price) as montant from order_products as o, products as p WHERE p.id = o.product_id and o.order_id = (SELECT id from orders WHERE type="Cart" and user_id ="'.$idUserCart.'")')->fetch()['montant'];

//Partie adresse de facturation
$billingAdressQuery = $bdd->prepare('SELECT * from user_addresses WHERE id =(SELECT billing_adress_id from users WHERE id=?)');
$billingAdressQuery->execute(array($_SESSION['uid']));
$billingAdress = $billingAdressQuery->fetch();

//Partie adresse de livraison
$deliveryAdressQuery = $bdd->query('SELECT * from order_addresses WHERE id =(SELECT delivery_adress_id from users WHERE id="'.$idUser.'")');
$deliveryAdress = $deliveryAdressQuery->fetch();
?>