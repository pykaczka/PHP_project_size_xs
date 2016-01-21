<?php
//zapis dla paczki kliku rekordów.
try{
	include "model2.php";
	$baza = new model2;
	$data = '';
	if (isset($_POST["data"])) { $data = "{\"tab\":[".$_POST["data"]."]}" ; }
	$obj  = (array)json_decode($data,true) ;
	$response = '';

	foreach ($obj['tab'] as $value){
		if ( isset($obj->tyt) and isset($obj->autn) and isset($obj->auti) and isset($obj->wyd)  and isset($obj->rok)  ) {
			$response = $baza->saveRec($value);
		}
	}
	echo ( $response ? "Dodano dane" : "Pusto " ) ;

}catch (Exception $e) {
	echo 'Nie ma nic dodanego offline: [' . $e->getCode() . '] ' . $e->getMessage() ;
}
?>
