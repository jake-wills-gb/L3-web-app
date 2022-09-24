<a>
	<?php echo validation_errors(); ?>
	<?php echo form_open('candidature_creer'); ?>
		<label for="nom">Nom</label>
		<input type="input" name="nom"/><br/>

		<label for="prenom">Prenom</label>
		<input type="input" name="prenom"/><br/>

		<label for="email">Email</label>
		<input type="input" name="email"/><br/>

		<label for="categorie">Categorie</label>
		<input type="input" name="categorie"/><br/>

		<label for="concours">Concours</label>
		<input type="input" name="concours"/><br/>

		<input type="submit" name="submit" value="Creer une candidature"/>
	</form>
</a>