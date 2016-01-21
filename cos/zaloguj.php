<?php
class zaloguj extends controller {
	function __construct() {
		parent::__construct() ;
	}
	function action() {
		$content = implode('', file('zaloguj.tpl'));
		return $content;
	} 
}

?>
