<?php
	include "User.php";
	include "Auth.php";

	$usr = $_POST['username'] ;
	$pas = $_POST['pass'] ;
	$user = new Auth() ;
	$user->login($usr,$pas);

	header("location:index.php?sub=baza");
?>
