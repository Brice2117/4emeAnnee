<?php
session_start();
//On va bien définir la session à chaque page visitée, et avant tout code html!
if (isset($_POST['login']) && isset($_POST['password'])) {
	$requestIsUser = $bdd->prepare('SELECT id from users WHERE email=? and password=?');
	$requestIsUser->execute(array($_POST['login'], $_POST['password']));
	if ($requestIsUser->rowCount() == 1) {
		//L'utilisateur s'est authentifié avec succés (aucun problème)
		$_SESSION['uid'] = $requestIsUser->fetch()['id'];
	}
	else {
		//On ne fait rien
	}
}
?>