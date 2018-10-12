<?php include('dataBase.php'); 

?>


<span id="block_header">
	<header>	
		<div class="logo">
			<a href="main.php"><img title="Accueil" src="pictures/caddy.png">
				<h1>E-commerce</h1>
			</a>
		</div>


		<div class="searchBar">
			<form method="GET" action="search.php">
				<input class="searchInput" type="text" name="searchBar" placeholder="Search for an article..." size="60" >
				<input id="go" type="image" src="pictures/go.png" name="searchBar">
			</form>
		</div>


			<div class="accountGestion">
				<form class="inputLogs" method = "POST" action="cart_page.php">
					<div>
						<input type="text" name="Id" placeholder="Id">
						<input type="password" name="password" placeholder="Password">
					</div>
					<input class="button" type="submit" name="login" value="LIEN CART">
				</form>
				<form action="createAccount.php">
					<input class="button" type="submit" name="register" value="register">
				</form>
			</div>
	</header>
</span>
