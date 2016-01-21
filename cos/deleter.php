<?php
try{
	include "model2.php";

	$baza = new model2;
	$baza->clearDB();
	header("location:index.php?sub=baza");

}catch (Exception $e) {
	echo 'Blad: [' . $e->getCode() . '] ' . $e->getMessage() ;
}
?>
