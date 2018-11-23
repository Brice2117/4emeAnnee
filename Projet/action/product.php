<?php 
	//On regarde si on récupere l'id du produit à afficher
	if (isset($_GET['product'])) {
		$productCode=$_GET['product'];
	} else {
		include 'main.php';
		die;
	}?>
	<?php
	//Si le cookie 1 n'existe pas, on le déclare avec le produit visité (2ème cookie avec sa date de création)
	if (!(isset($_COOKIE['time1']))){
		setcookie('product1',$productCode,time() + 7*24*3600,null,null,false,true);
		setcookie('time1',time(),time() + 7*24*3600,null,null,false,true);
	}
	//sinon si le cookie 2 n'existe pas et que le produit visité n'est pas l'un des produits déjà enregistré, on l'enregistre
	else if (!(isset($_COOKIE['time2'])) and $productCode!=$_COOKIE['product1']){
		setcookie('product2',$productCode,time() + 7*24*3600,null,null,false,true);
		setcookie('time2',time(),time() + 7*24*3600,null,null,false,true);
	}
	//sinon si le cookie 3 n'existe pas et que le produit visité n'est pas l'un des produits déjà enregistré, on l'enregistre
	else if (!(isset($_COOKIE['time3']))and $productCode!=$_COOKIE['product1'] and $productCode!=$_COOKIE['product2']){
		setcookie('product3',$productCode,time() + 7*24*3600,null,null,false,true);
		setcookie('time3',time(),time() + 7*24*3600,null,null,false,true);
	}
	//sinon si le cookie 4 n'existe pas et que le produit visité n'est pas l'un des produits déjà enregistré, on l'enregistre
	else if (!(isset($_COOKIE['time4']))and $productCode!=$_COOKIE['product1']and $productCode!=$_COOKIE['product2'] and $productCode!=$_COOKIE['product3']){
		setcookie('product4',$productCode,time() + 7*24*3600,null,null,false,true);
		setcookie('time4',time(),time() + 7*24*3600,null,null,false,true);
	}
	//sinon si le cookie 5 n'existe pas et que le produit visité n'est pas l'un des produits déjà enregistré, on l'enregistre
	else if (!(isset($_COOKIE['time5']))and $productCode!=$_COOKIE['product1'] and $productCode!=$_COOKIE['product2']and $productCode!=$_COOKIE['product3'] and $productCode!=$_COOKIE['product4']){
		setcookie('product5',$productCode,time() + 7*24*3600,null,null,false,true);
		setcookie('time5',time(),time() + 7*24*3600,null,null,false,true);
	}
	//sinon si 5 cookies existe déjà et que le produit visité n'est pas l'un des produits déjà enregistré
	else if ($productCode!=$_COOKIE['product1'] and $productCode!=$_COOKIE['product2']and $productCode!=$_COOKIE['product3'] and $productCode!=$_COOKIE['product4']and $productCode!=$_COOKIE['product5']){
		//On regarde le cookie le plus vieux
		$time = min($_COOKIE['time1'],$_COOKIE['time2'],$_COOKIE['time3'],$_COOKIE['time4'],$_COOKIE['time5']);
		//on remplace le cookie le plus vieux par le produit visité
		if ($time == $_COOKIE['time1']){
			setcookie('product1',$productCode,time() + 7*24*3600,null,null,false,true);
			setcookie('time1',time(),time() + 7*24*3600,null,null,false,true);
		}else if($time == $_COOKIE['time2']){
			setcookie('product2',$productCode,time() + 7*24*3600,null,null,false,true);
			setcookie('time2',time(),time() + 7*24*3600,null,null,false,true);
		}else if($time == $_COOKIE['time3']){
			setcookie('product3',$productCode,time() + 7*24*3600,null,null,false,true);
			setcookie('time3',time(),time() + 7*24*3600,null,null,false,true);
		}else if($time == $_COOKIE['time4']){
			setcookie('product4',$productCode,time() + 7*24*3600,null,null,false,true);
			setcookie('time4',time(),time() + 7*24*3600,null,null,false,true);
		}else {
			setcookie('product5',$productCode,time() + 7*24*3600,null,null,false,true);
			setcookie('time5',time(),time() + 7*24*3600,null,null,false,true);
		}
	}
?>