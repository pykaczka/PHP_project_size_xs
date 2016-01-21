<?php

try{
	include "model2.php";
	class baza extends controller {
	   	function __construct() {
	     		parent::__construct() ;
	   	}
	  	function action() {
			session_start();
			if($_SESSION["ident"] == 'test'){
				$content = implode('', file('baza.tpl'));
				$baza = new model2;
		  	}else{
				$content = implode('', file('deny.tpl'));
		  	}
			return $content;
	  	}
	}

}catch (Exception $e) {
	echo 'Blad: [' . $e->getCode() . '] ' . $e->getMessage() ;
}
?>
