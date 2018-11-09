<div id="ordersDisplay">

	<h1>Liste de vos commandes</h1>

	<div class="recap_commande">
		<table>
			<thead>
				<td id="Numero_commande">Numéro de commande</td>
				<td id="nbArticles"> Nombre d'articles </td>
				<td id="total"> Montant total </td>
			</thead>
			<tbody>
			<?php 
				for ($i = 0; $i < $requestData->rowCount(); $i++) {
					$data = $requestData->fetch()?>
				<tr>
				<td> Commande n°<?php echo $data['id'] ?> </td>
				<td>
					<?php echo $data['nbArticles'];?>
				</td>
				<td>
					<?php  echo $data['amount'];?>
				</td>
			    </tr>
			    <tr><td class="ViewDetails" colspan="3"><form method="GET" action="index.php">
			    	<input type="hidden" name="page" value="cart_page">
			    	<input type="hidden" name="order_id" value="<?php echo $data['id'] ?>">
			    	<input type="submit" name="ViewDetails" value="ViewDetails"></form></td></tr>
			<?php } ?>
			</tbody>
		</table>
	</div>
</div>