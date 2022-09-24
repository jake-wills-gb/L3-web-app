<?php
echo validation_errors();
?>
<?php
echo form_open('compte/connecter');
?>
	<label>Saisissez vos indentifiants ici: </label><br>
	<input type="text" name="pseudo"/>
	<input type="password" name="mdp"/>
	<input type="submit" name="Connexion"/>
</form>