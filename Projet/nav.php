<?php include 'dataBase.php' ?>
<span id="block_nav">
	<nav id="nav">
		<ul>
			<li id="title_nav"><h1>Categories</h1></li>
			<?php $reponseNav = $bdd->query('SELECT * from categories');
			?>
			<?php
			for ($i=0;$i<$reponseNav->rowCount();$i++) {
				$donneeNav= $reponseNav->fetch();?>
			  	<a href="search.php?search=<?php echo $donneeNav['name']?>"><li><?php echo $donneeNav['name'] ?><img src="pictures/<?php echo $donneeNav['picture'] ?>"></li></a>
			<?php } ?>

			<li class="contactUs">
				<h1>Contact us !</h1>
				<p>mail : ecommerce@commerce.com</p>
				<p>tel : 09 88 99 99 50</p> 
				<div class="socialNetwork">
					<a href="https://www.facebook.com/" target="_blank"><img src="pictures/logo-fb.png" title="Facebook/ecommerce"></a>
					<a href="https://twitter.com/" target="_blank"><img src="pictures/logo-twitter.png" title="Facebook/ecommerce"></a>
					<a href="https://www.instagram.com" target="_blank"><img src="pictures/logo-insta.png" title="Facebook/ecommerce"></a>
				</div>
			</li>

		</ul>
	</nav>
</span>