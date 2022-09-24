<h1>
	<table class="table">
		<thead>
    		<tr>
				<th scope="col">Nom</th>
				<th scope="col">Prenom</th>
				<th scope="col">Categorie</th>
			</tr>
		</thead>
		<tbody>
			<?php
				if($candidatures != NULL){
					foreach($candidatures as $ligne){
						echo '<tr>';
						echo '<td>'.$ligne['CDR_nom'].'</td>';
						echo '<td>'.$ligne['CDR_prenom'].'</td>';
						echo '<td>'.$ligne['categorie'].'</td>';
						echo '<td>';
						echo '</td>';
						//echo '<td><button type="button"'; if($ligne['phase']!='inscriptions'){echo 'disabled';}else{echo '';} echo '>Inscription</button></td>';
						echo '</tr>';
					}
				}
				else{
					echo "pas de cdr";
				}
			?>
		</tbody>
	</table>
</h1>