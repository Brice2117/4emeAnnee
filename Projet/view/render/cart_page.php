<div id="cart_page">
	<h1>Shopping Cart</h1>
<!-- On suppose pour l'instant connu l'id de l'utilisateur. Il faut regarder s'il y a un panier en cours de réalisation -->
<!-- Dans $reponseCart, on a la commande en cours (si elle existe) de l'utilisateur. -->
		<?php if($haveCart == 0) { ?>
			<h2>Vous n'avez aucun panier en cours. Veillez choisir un produit pour en créer un nouveau</h2>
		<?php } else {?>
			<!-- Dans ce cas, l'utilisateur a une commande en cours!-->
			<table>
			<theader>
				<tr id="theader">
					<td name="product" id="product" colspan="2"> <div class ="theader">Product</div></td>
					<td name="price">  Price  </td>
					<td>  </td>
					<td name="quantity" id="quantity">  Quantity  </td>
				</tr>
			</theader>
			<tbody>
				<?php
				for ($i=0; $i < $Cart->rowCount(); $i++) {
					$donneeCart = $Cart->fetch();
					$product_id = $donneeCart['product_id'];
					$quantity = $donneeCart['Q'];
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
					<td name=quantity><form action="index.php" metho="GET"><input type="hidden" name="page" value="modif_cart"><input type="hidden" name="id_produit" value="<?php echo $product_id?>"><input name="quantity" class="quantity" type="number" min="0" value="<?php echo $donneeCart['Q']?>"></form></td>
				</tr>
			    <?php }?>
			</tbody>
			<tfoot>
				<td colspan="5"><h3>Total : <?php echo $montant['montant'] ?> $</h3></td>
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
				<a href="index.php?page=main"><input type="button" name="continue" value="Continue" class="bouton"></a>
			</td>
			<td>
				<a href="index.php?page=confirm_cart"><input type="button" name="check" value="Check your Cart" class="bouton"></a>
			</td>
			</thead>
			</table>
			</a>
			</form>
		</div>
	<?php } ?>
</div>