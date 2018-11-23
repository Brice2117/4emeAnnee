<?php 
	$array = array();
	//on récupère les informations des produits dont l'id est enregistré dans les cookies
	//Si les 5 cookies sont set
	if (isset($_COOKIE['time5'])){
		$array[] = $_COOKIE['product5'];
		$array[] = $_COOKIE['product4'];
		$array[] = $_COOKIE['product3'];
		$array[] = $_COOKIE['product2'];
		$array[] = $_COOKIE['product1'];
		$reponseProduct2 = $bdd->query('SELECT * from products WHERE id='.$array[4].' OR id='.$array[3].' OR id='.$array[2].' OR id='.$array[1].' OR id='.$array[0].'');
	}
	//Si 4 cookies sont set
	else if (isset($_COOKIE['time4'])){
		$array[] = $_COOKIE['product4'];
		$array[] = $_COOKIE['product3'];
		$array[] = $_COOKIE['product2'];
		$array[] = $_COOKIE['product1'];
		$reponseProduct2 = $bdd->query('SELECT * from products WHERE id="'.$array[3].'" OR id="'.$array[2].'" OR id="'.$array[1].'" OR id="'.$array[0].'"');
	}
	//Si 3 cookies sont set
	else if (isset($_COOKIE['time3'])){
		$array[] = $_COOKIE['product3'];
		$array[] = $_COOKIE['product2'];
		$array[] = $_COOKIE['product1'];
		$reponseProduct2 = $bdd->query('SELECT * from products WHERE id="'.$array[2].'" OR id="'.$array[1].'" OR id="'.$array[0].'"');
	}
	//Si 2 cookies sont set
	else if (isset($_COOKIE['time2'])){
		$array[]= $_COOKIE['product2'];
		$array[] = $_COOKIE['product1'];
		$reponseProduct2 = $bdd->query('SELECT * from products WHERE id="'.$array[1].'" OR id="'.$array[0].'"');
	}
	//Si 1 cookie est set
	else if (isset($_COOKIE['time1'])){
		$array[]= $_COOKIE['product1'];
		$reponseProduct2 = $bdd->query('SELECT * from products WHERE id="'.$array[0].'"');
	}

 ?>