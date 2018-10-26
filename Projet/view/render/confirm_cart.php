<!-- Quand on est sur cette page, l'utilisateur s'est identifié (il a bien un id dans la base de donnée qui correspond) -->

	<div id="confirm_cart">

		<h1>Validation de votre commande</h1>

		<div class="recap_commande">
			<table>
				<thead>
					<td id="nbArticles"> Nombre d'articles </td>
					<td id="total"> Montant total </td>
				</thead>
				<tbody>
					<tr>
					<td>
						<?php echo $nbArticles;?>
					</td>
					<td>
						<?php  echo $montantCart;?>
					</td>
				    </tr>
				</tbody>
				<tfoot>
					<td colspan="2"><a href="index.php?page=cart_page"><div >Modifier la commande</div></a></td>
				</tfoot>
			</table>
		</div>

		<div class="adress">
			<table>
				<thead>
					<td colspan="4"> Adresse de Facturation </td>
				</thead>
				<tbody>
					<tr>
						<td> Destinataire </td>
						<td colspan="3"><?php echo $billingAdress['human_name']?></td>
				    </tr>
				    <tr>
				    	<td rowspan="2"> Adresse </td>
				    	<td colspan="3" name="add1"><?php echo $billingAdress['address_one']?></td>
				    </tr>
				    <tr>
				    	<td colspan="3" name="add2"><?php echo $billingAdress['address_two']?></td>
				    </tr>
				    <tr>
				    	<td> Ville </td>
				    	<td><?php echo $billingAdress['city']?></td>
				    	<td> Code postal </td>
				    	<td><?php echo $billingAdress['postal_code']?></td>
				    </tr>
				    <tr>
				    	<td></td><td></td>
				    	<td> Pays </td>
				    	<td><?php echo $billingAdress['country']?></td>
				    </tr>
				</tbody>
				<tfoot>
					<td colspan="4"><a href="cart_page.php"><div>Modifier</div></a></td>
				</tfoot>
			</table>
		</div>


		<p><div class="adress">
			<table>
				<thead>
					<td colspan="4"> Adresse de Livraison </td>
				</thead>
				<tbody>
					<tr>
						<td> Destinataire </td>
						<td colspan="3"><?php echo $deliveryAdress['human_name']?></td>
				    </tr>
				    <tr>
				    	<td rowspan="2"> Adresse </td>
				    	<td colspan="3" name="add1"><?php echo $deliveryAdress['address_one']?></td>
				    </tr>
				    <tr>
				    	<td colspan="3" name="add2"><?php echo $deliveryAdress['address_two']?></td>
				    </tr>
				    <tr>
				    	<td> Ville </td>
				    	<td><?php echo $deliveryAdress['city']?></td>
				    	<td> Code postal </td>
				    	<td><?php echo $deliveryAdress['postal_code']?></td>
				    </tr>
				    <tr>
				    	<td></td><td></td>
				    	<td> Pays </td>
				    	<td><?php echo $deliveryAdress['country']?></td>
				    </tr>
				</tbody>
				<tfoot>
					<td colspan="4"><div><form method="GET"><input type="button" name="modifDelivery" value="Modify"></form></div></td>
				</tfoot>
			</table>

		</div></p>
	</div>