<?php
// On détruit les variables de notre session
//on peut remarquer que le session_start est déjà présent...
session_unset();
unset($_SESSION['uid']);
$_SESSION = array();
// On détruit notre session
session_destroy();
$page='main';
?>