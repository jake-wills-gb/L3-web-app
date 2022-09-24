<?php
echo validation_errors();
?>
<?php
echo form_open('Compte/modif_mdp');
?>
	<label>Nouveau mot de passe: </label><br>
	<input type="password" name="mdp"/>
	<input type="submit" name="Connexion"/>
</form>