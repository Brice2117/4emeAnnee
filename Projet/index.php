<!DOCTYPE html>
<?php 
//On inclue la base de donné
include 'dataBase.php';
?>

<?php 
//On vérifie si l'utilisateur est connecté
include('checkUser.php');
?>

<?php  
//on regarde sur quelle page on veut allez si l'information est transmise dans l'URL ou caché sinon on charge la page d'acceuil
if (isset($_GET['page'])) {

	$page=$_GET['page'];
} else if (isset($_POST['page'])) {
	$page=$_POST['page'];
	//Utilise post lorsqu'on manipule des données sensibles!
} else {
	$page='main';
}
?>


<?php
//On charge la page action si elle existe
$filenameAction = 'action/'.$page.'.php';
if (file_exists($filenameAction)){
	include $filenameAction;
}
?>


<html>
<head>
	<meta charset="UTF-8">
	<?php
	//on charge le css de la page à afficher s'il y en a un et on inclue le CSS de la barre de navigation et du header
	$filenameCss = 'css/'.$page.'.css';
	if (file_exists($filenameCss)){ ?>
		<link rel="stylesheet" href="<?php echo $filenameCss ?>"/>

	<?php } if ($page != 'createAccount') {?>
		<link rel="stylesheet" href="css/styleNav.css"/>
		<link rel="stylesheet" href="css/styleHeader.css"/>
		<?php }?>
	<title>Nom du site</title>
</head>
<body>



<?php
// On inclue la mise en page du menue de navigation et du header
if ($page != 'createAccount'){
	include('view/nav.php');
	include('view/render/header.php'); 
	include('view/render/nav.php'); 
}
?>


<?php
//on inclus les requêtes a la base de donné de la page à afficher si elle existe
$filenameView = 'view/'.$page.'.php';
if (file_exists($filenameView)){
	include $filenameView;
}else{
} 
?>

<?php
//on inclus la mise en page de la page à afficher si elle existe
$filenameView = 'view/render/'.$page.'.php';
if (file_exists($filenameView)){
	include $filenameView;
}else{
	echo 'Une erreur est survenue, nos équipes sont sur le coup';
} ?>

</body>
</html>