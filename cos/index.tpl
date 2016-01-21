<!DOCTYPE HTML>
<html>
  <head>
	<meta charset="UTF-8"/>
	<title>Projekt 2 Paulina Kaczor</title>
	<link rel="stylesheet" href="index.css" type="text/css" media="screen"/>
  </head>
  <body>
  <div class="container">
	<div class="header">Projekt 2</div>
	<nav class="menu">
		<div class="link"><a href="index.php">HOME</a></div>
		<div class="link"><a href="index.php?sub=zaloguj">ZALOGUJ</a></div>
		<div class="link"><a href="index.php?sub=offline">OFFLINE</a></div> 
	</nav>
  
  </div>
	<div>
		<?php echo $content; ?>
	</div>
	<div id="info_field"></div>
	<br/>
	<script src="index.js"></script>
  </body>
</html>
