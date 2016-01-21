<div class="dodaj">
		<form>
			<label for="tyt">Tytuł:</label>
			<input name="tyt" id="tyt" type="text"><br>
			<label for="autn">Autor (nazwisko):</label>
			<input name="autn"  id="autn" type="text"><br>
			<label for="auti">Autor (imie):</label>
			<input name="auti" id="auti" type="text"><br>
			<label for="wyd">Wydawnictwo:</label>
			<input name="wyd" id="wyd" type="text"><br>
			<label for="rok">Rok wydania:</label>
			<input name="rok" id="rok" type="value"><br>

			<button type="button" onclick="sprawdz()">Dodaj</button><br>
			<button type="button" onclick="podglad()">Podgląd</button><br>
			<button type="button" onclick="czysc()">Wyczyść</button><br>
		</form> 
	  
	<div id="stan" class="lista"> </div>
</div>
