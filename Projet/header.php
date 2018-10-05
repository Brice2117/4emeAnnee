<span id="block_header">
	<header>	
		<div class="logo">
			<a href="main.php"><img title="Accueil" src="pictures/caddy.png">
			<h1>E-commerce.com</h1>
			</a>
		</div>


		<div class="searchBar">
		<form method="GET" action="www.google.com">
			<input class="searchInput" type="text" name="seachBar" placeholder="Search for an article..." size="60" >
			<input id="go" type="image" src="pictures/go.png" name="submit">
			
		</form>
		</div>

		<div class="accountGestion">
		<form class="inputLogs" method = "GET" action="product.php">
			<div>
				<input type="text" name="Id" placeholder="Id">
				<input type="password" name="password" placeholder="Password">
			</div>

			<input class="button" type="submit" name="login" value="log in">

		</form>
		<form action="product.php">
			<input class="button" type="submit" name="register" value="register">
		</form>
		</div>

	</header>
</span>