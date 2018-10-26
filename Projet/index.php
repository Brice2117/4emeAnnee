<!DOCTYPE html>
<?php 
include 'dataBase.php';
?>

<?php 
include('checkUser.php');
?>

<?php  
if (isset($_GET['page'])) {
	$page=$_GET['page'];
} else if (isset($_POST['page'])) {
	$page=$_POST['page'];
	//Utilise post lorsqu'on manipule des données sensibles!
}
else {
	$page='main';
}
?>


<?php
$filenameAction = 'action/'.$page.'.php';
if (file_exists($filenameAction)){
	include $filenameAction;
}
?>


<html>
<head>
	<meta charset="UTF-8">
	<?php
	$filenameCss = 'css/'.$page.'.css';
	if (file_exists($filenameCss)){ ?>
		<link rel="stylesheet" href="<?php echo $filenameCss ?>"/>
	<?php }?>
	<link rel="stylesheet" href="css/styleNav.css"/>
	<link rel="stylesheet" href="css/styleHeader.css"/>
	<title>Nom du site</title>
</head>
<body>



<?php
if ($page != 'createAccount'){
	include('view/nav.php');
	include('view/render/header.php'); 
	include('view/render/nav.php'); 
}
?>


<?php
$filenameView = 'view/'.$page.'.php';
if (file_exists($filenameView)){
	include $filenameView;
}else{
} 
?>

<?php
$filenameView = 'view/render/'.$page.'.php';
if (file_exists($filenameView)){
	include $filenameView;
}else{
	echo 'Une erreur est survenue, nos équipes sont sur le coup';
} ?>

</body>
</html>