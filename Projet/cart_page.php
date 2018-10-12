<!DOCTYPE html>
<html>
<head>
	<title>e-commerce.com</title>
	<link rel="stylesheet" href="css/styleNav.css"/>
	<link rel="stylesheet" href="css/styleHeader.css"/>
	<link rel="stylesheet" href="css/cart_page.css"/>
	<style>
		#cart_page tbody tr:nth-child(even) {background-color: rgb(82,183,242);}
		#cart_page tbody tr:nth-child(odd) {background-color:  rgb(52,143,198);}
	</style>
</head>
<body>

	<?php include('dataBase.php'); ?>
	<?php include('header.php'); ?>
	<?php include('nav.php'); ?>
<!--
-->
	<div id="cart_page">
		<h1>Shopping Cart</h1>
			<?php $idUser = 1;?> 
<!-- On suppose pour l'instant connu l'id de l'utilisateur. Il faut regarder s'il y a un panier en cours de réalisation -->
			<?php $reponseCart = $bdd->query('SELECT Count(id) from orders WHERE type="Cart" and user_id ="'.$idUser.'"');?>
<!-- Dans $reponseCart, on a la commande en cours (si elle existe) de l'utilisateur. -->
			<?php if($reponseCart->fetch()['Count(id)']==0) { ?>
				<h2>Vous n'avez aucun panier en cours. Veillez choisir un produit pour en créer un nouveau</h2>
			<?php } else {?>
				<!-- Dans ce cas, l'utilisateur a une commande en cours!-->
				<?php $Cart = $bdd->query('SELECT o.id as order_line, p.id as product_id, quantity, name, picture, description_courte, p.unit_price from order_products as o, products as p WHERE p.id = o.product_id and o.order_id = (SELECT id from orders WHERE type="Cart" and user_id ="'.$idUser.'")'); ?>
				<table>
				<theader>
					<tr id="theader" style="background-color:rgb(67,163,220);">
						<td name="product" colspan="2" style="border-radius: 5px 0px 0px 0px;"> <div class ="theader">Product</div></td>
						<td name="price">  Price  </td>
						<td>  </td>
						<td name="quantity" style="border-radius: 0px 5px 0px 0px;">  Quantity  </td>
					</tr>
				</theader>
				<tbody>
					<?php
					for ($i=0; $i < $Cart->rowCount(); $i++) {
						$donneeCart = $Cart->fetch();
						$order_line = $donneeCart['order_line'];
						$quantity = $donneeCart['quantity'];
						?>
					<tr>
						<td>
							<a href="product.php?product=<?php echo $donneeCart['product_id']?>">
							<img src="pictures/<?php echo $donneeCart['picture']?>">
							</a>
						</td>
						<td>
							<a href="product.php?product=<?php echo $donneeCart['product_id']?>">
							<div class="product"><p><h3><?php echo $donneeCart['name'] ?></h3></p>
							<p><?php echo $donneeCart['description_courte']?></p></div></a></td>
						<td><div class="price"><?php echo $donneeCart['unit_price']?>$</div></td>
						<td>  </td> 
						<td name=quantity><form metho="GET"><input name="<?php echo $order_line ?>" id="<?php echo $order_line?>" class="quantity" type="number" min="0" onchange="setQuantity();" value="<?php echo $quantity ?>" 
							></form></td>
					</tr>
				    <?php }?>
				</tbody>
				<tfoot>
					<?php $montantCart = $bdd->query('SELECT SUM(o.quantity * p.unit_price) as montant from order_products as o, products as p WHERE p.id = o.product_id and o.order_id = (SELECT id from orders WHERE type="Cart" and user_id ="'.$idUser.'")'); 
					$montant = $montantCart->fetch();?>
					<td colspan="5" style="background-color:rgb(67,163,220); border-radius: 0px 0px 5px 5px; max-height: 30px;"><h3>Total : <?php echo $montant['montant'] ?> $</h3></td>
				</tfoot>
			</table>
			<div class="check">
				<form>
				<a>
					<table>
						<thead>
							<td>
					<input type="button" name="cancel" value="Cancel" class="bouton" onclick="">
				</td>
				<td>
					<a href="main.php"><input type="button" name="continue" value="Continue" class="bouton"></a>
				</td>
				<td>
					<a href="confirm_cart.php"><input type="button" name="check" value="Check your Cart" class="bouton"></a>
				</td>
				</thead>
				</table>
				</a>
				</form>
			</div>
		<?php } ?>
	</div>
</body>
</html>

<script>
	
	function setQuantity()
	{
		alert(<?php echo $_GET[$order_line] ?>);
		<?php
		$newQuantity = $_GET[$order_line];
		$update = $bdd->prepare('UPDATE order_products SET quantity=? WHERE id =?');
		$update->execute(array($newQuantity, $order_line));
		$quantity = $newQuantity;
		?>
		alert(<?php echo $newQuantity ?>);
		alert(<?php echo $quantity ?>);
	}
</script> 