<a>
	<?php
		if(isset($candidature)){
			echo '<table class="table">';
			echo '<thead>';
    		echo '<tr>';
			echo	'<th scope="col">Nom</th>';
			echo	'<th scope="col">Prenom</th>';
			echo	'<th scope="col">Etat</th>';
			echo '</tr>';
			echo '</thead>';
			echo '<tbody>';
			echo '<tr>';
			echo '<td>'.$candidature[0]['CDR_nom'].'</td>';
			echo '<td>'.$candidature[0]['CDR_prenom'].'</td>';
			echo '<td>'.$candidature[0]['etat'].'</td>';
			echo '</tr>';
			echo '</tbody>';
			echo '</table>';
			echo '<table class="table">';
			echo '<thead>';
    		echo '<tr>';
			echo	'<th scope="col">Fichiers</th>';
			echo	'<th scope="col">Liens</th>';
			echo '</tr>';
			foreach($candidature as $colonne){
				echo '<tr>';
				echo '<td>'.$colonne['fichier'].'</td>';
				echo '<td>lien</td>';
				echo '</tr>';
			}
			echo '</table>';
		}
		else{
			echo validation_errors();
			echo form_open('Candidature/get');
			echo '<label for="id">Code ID</label>';
			echo '<input type="input" name="id" minlength=8 maxlength=8/><br/>';

			echo '<label for="inscr">Code inscription</label>';
			echo '<input type="input" name="inscr" minlength=20 maxlength=20/><br/>';

			echo '<input type="submit" name="submit" value="Trouver une candidature"/>';
			echo '</form>';
		}
	?>
	
</a>