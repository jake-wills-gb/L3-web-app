<h2>Espace compte de <?php echo $this->session->userdata("username");?> - <?php echo $this->session->userdata("status");?></h2>
<a href="<?php echo base_url();?>index.php/Compte/modif_mdp">Changer mon mot de passe</a>
<br />
<?php
	if($this->session->userdata("status")=="ADMIN"){
		echo ("<a href=".base_url()."index.php/Compte/lister>Gestion de comptes</a>");
		echo "<br />";
		echo ("<a href=".base_url()."index.php/Concours/afficher_admin>Concours</a>");
	}
?>
