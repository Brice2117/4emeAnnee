<span id="block_header">
	<header>	
		<div class="logo">
			<a href="index.php?page=main"><img title="Accueil" src="pictures/caddy.png">
				<h1>E-commerce</h1>
			</a>
		</div>


		<div class="searchBar">
			<form method="GET" action="index.php">
				<input type="hidden" name="page" value="search">
				<input class="searchInput" type="text" name="searchBar" placeholder="Search for an article..." size="60" >
				<input id="go" type="image" src="pictures/go.png" name="searchBar">
			</form>
		</div>


			<div class="accountGestion">
				<?php if (!isset($_SESSION['uid']) ) { ?>
				<form class="inputLogs" method = "POST" action="index.php">
					<div>
						<input type="text" name="login" placeholder="Id">
						<input type="password" name="password" placeholder="password">
					</div>
					<input class="button" type="submit" name="sign_in" value="Sign in">
				</form>
				<form action="index.php">
					<input type="hidden" name="page" value="createAccount">
					<input class="button" type="submit" name="register" value="register">
				</form>
				<?php } else { ?>
					<!--Das ce cas, on est connecté, et on a d'autres boutons-->
					<form action="index.php">
						<input type="hidden" name="page" value="cart_page">
						<input class="button" type="submit" name="cart" value="Cart">
					</form>
					<form action="index.php">
						<input type="hidden" name="page" value="ordersDisplay">
						<input class="button" type="submit" name="disconnect" value="Orders">
					</form>
					<form action="index.php">
						<input type="hidden" name="page" value="disconnect">
						<input class="button" type="submit" name="disconnect" value="Log out">
					</form>
				<?php } ?>
			</div>
	</header>
</span>
