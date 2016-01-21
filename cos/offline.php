<?php
class offline extends controller {
	function __construct() {
		parent::__construct() ;
	}
	function action() {
		$content = implode('', file('offline.tpl'));
		return $content;
	} 
}

?>
