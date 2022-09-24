<h1>
	<table class="table">
		<thead>
    		<tr>
				<th scope="col">Titre</th>
				<th scope="col">Responsable</th>
				<th scope="col">Discipline</th>
				<th scope="col">Categorie</th>
				<th scope="col">Date debut</th>
				<th scope="col">Date inscription</th>
				<th scope="col">Date preselection</th>
				<th scope="col">Date fin</th>
				<th scope="col">Phase</th>
				<th scope="col">Jury</th>
				<th scope="col">Inscription</th>
				<th scope="col">Candidats</th>
				<th scope="col">Palmares</th>
			</tr>
		</thead>
		<tbody>
			<?php
				if($concours != NULL){
					foreach($concours as $ligne){
						if(!isset($traite[$ligne['CCR_concours_id']])){
							echo '<tr>';
							$ccr_id = $ligne['CCR_concours_id'];
							echo '<td>'.$ligne['CCR_titre'].'</td>';
							echo '<td>'.$ligne['responsable'].'</td>';
							echo '<td>'.$ligne['DIS_titre'].'</td>';
							echo '<td>'.$ligne['CAT_cat_title'].'</td>';
							echo '<td>'.$ligne['CCR_date_debut'].'</td>';
							echo '<td>'.$ligne['CCR_date_inscription'].'</td>';
							echo '<td>'.$ligne['CCR_date_preselection'].'</td>';
							echo '<td>'.$ligne['CCR_date_fin'].'</td>';
							echo '<td>'.$ligne['phase'].'</td>';
							echo '<td>';
							foreach($concours as $jury){
								echo "<ul>";
								if(strcmp($ccr_id,$jury["CCR_concours_id"])==0){
									echo "<li>";
									echo $jury["jury"];
									echo "</li>";
								}
								echo "</ul>";
							}
							echo '</td>';
							$traite[$ligne['CCR_concours_id']]=1;
							echo '<td><button type="button"'; if($ligne['phase']!='inscriptions'){echo 'disabled';}else{echo '';} echo '>Boutton à faire</button></td>';
							echo '<td><button type="button"'; if($ligne['phase']!='finale'){echo 'disabled';}else{echo '';} echo '>Boutton à faire</button></td>';
							echo '<td><button type="button"'; if($ligne['phase']!='termine'){echo 'disabled';}else{echo '';} echo '>Boutton à faire</button></td>';
						}
						echo '</tr>';
					}
				}
				else{
					echo "pas de concours";
				}
			?>
		</tbody>
	</table>
</h1>