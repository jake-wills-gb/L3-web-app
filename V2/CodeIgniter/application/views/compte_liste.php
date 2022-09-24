<h1><?php echo $titre;?></h1>
<br />
<?php
	if($this->session->userdata("status")=="ADMIN"){
		echo ("<a href=".base_url()."index.php/Compte/creer>Creer un compte</a>");
	}
?>
<br />
<?php
if($pseudos != NULL){
	foreach($pseudos as $login){
		echo "<br />";
		echo " -- ";
		echo $login["CPT_compte_pseudo"];
		echo " -- ";
		echo "<br />";
	}
}
else{
	echo "<br />";
	echo "Aucun compte !";
}
?>