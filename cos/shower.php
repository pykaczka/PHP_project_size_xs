<?php
//wyświetla baze
	try{
		include "model2.php";
		$baza = new model2;
		$data = $baza->listAll();
		$response = '<table border="1">';

		if ($data) {
		       foreach ( $data as $row ) {
		       $response .= '<tr><td>'.htmlentities($row['tyt'],ENT_HTML5).'</td><td>'.htmlentities($row['autn'],ENT_HTML5).'</td><td>'.htmlentities($row['auti'],ENT_HTML5).'</td><td>'.htmlentities($row['wyd'],ENT_HTML5).'</td><td>'.htmlentities($row['rok'],ENT_HTML5).'</td></tr>' ;
		    }}

		$response .='</table>';
		echo $response;
	}catch (Exception $e) {
		echo 'Blad w saver_o: [' . $e->getCode() . '] ' . $e->getMessage() ;
	}
?>
