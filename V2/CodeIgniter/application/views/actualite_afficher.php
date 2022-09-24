<h1><?php echo $titre;?></h1>
<br />
<?php
if(isset($actu)){
	echo $actu->ACT_titre_actu;
	echo (" -- ");
	echo $actu->ACT_text;
}
else{
	echo "<br />";
	echo "pas d'actu";
}
?>