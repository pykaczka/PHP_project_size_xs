<?php
class main extends controller {
	function __construct() {
		parent::__construct() ;
	}
	function action() {
		session_start();
		$content = implode('', file('main.tpl'));
		return $content;
	}
}

?>
