<?php
try {
	include 'controller.php';
	include 'main.php';
	include 'baza.php';
	include 'offline.php';
	include 'zaloguj.php';

	session_start();
	if (empty ($_GET['sub'])) { $contr = 'main' ;   }
	else { $contr = $_GET['sub'] ;}

	$controller = new $contr() ;
	$content =  $controller->action() ;
	include ('index.tpl');

}catch (Exception $e) {
	echo 'Blad: [' . $e->getCode() . '] ' . $e->getMessage() ;
}

?>
