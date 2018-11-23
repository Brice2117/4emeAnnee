<?php
session_start();
//On va bien définir la session à chaque page visitée, et avant tout code html!

//On regarde les cookies pour se connecter automatiquement (non sécurisée pour le password, il faudrait utiliser une clé)
if (isset($_COOKIE['uid']) && isset($_COOKIE['password'])) {
	$_POST['login'] = $_COOKIE['uid'];
	$_POST['password'] = $_COOKIE['password'];

} 

//On regarde si le login et le password sont bon, si oui on se connecte
if (isset($_POST['login']) && isset($_POST['password'])) {
	$requestIsUser = $bdd->prepare('SELECT * from users WHERE email=? and password=?');
	$requestIsUser->execute(array($_POST['login'], $_POST['password']));
	if ($requestIsUser->rowCount() == 1) {
		//L'utilisateur s'est authentifié avec succés (aucun problème)
		$requestIsUser = $requestIsUser->fetch();
		$_SESSION['uid'] = $requestIsUser['id'];
		setcookie('uid',$requestIsUser['email'],time() + 7*24*3600,null,null,false,true);
		//Méthode de cookies non sécurisée pour le password, il faudrait utiliser une clé
		setcookie('password',$requestIsUser['password'],time() + 7*24*3600,null,null,false,true);
	}
	else {
		//On ne fait rien
	}
}
?>