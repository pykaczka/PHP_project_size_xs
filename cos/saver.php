<?php
try{
//Mechanizm do zapisu danych do bazy.
	include "model2.php";
	$baza = new model2;
	$data = '';

	if (isset($_POST["data"])) { $data = $_POST["data"] ; }
	$obj  = json_decode($data) ;
	$response = '';

	if ( isset($obj->tyt) and isset($obj->autn) and isset($obj->auti) and isset($obj->wyd)  and isset($obj->rok) ) {
            $response = $baza->saveRec($obj) ;
	}
	echo ( $response ? "Dodano dane" : "Blad " ) ;
}catch (Exception $e) {
	echo 'Blad: [' . $e->getCode() . '] ' . $e->getMessage() ;
}
?>
