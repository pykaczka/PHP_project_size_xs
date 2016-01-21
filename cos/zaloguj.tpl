	<div class="dodaj">
	<form method="POST" action="log.php">
		<label for="login">Login:</label>
		<input name="username" size="20" id="username" type="text"><br>
		<label for="password">Hasło:</label>
		<input name="pass" size="20" id="pass" type="password"><br>

		<input name="submit" value="zaloguj" type="submit"><br></td>
	</form>  
	<div class="message"><?php echo $msg ; ?></div>
  	</div>
