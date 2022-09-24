<h1>
	<table class="table">
		<thead>
    		<tr>
				<th scope="col">Titre actualité</th>
				<th scope="col">Description</th>
				<th scope="col">Date</th>
			</tr>
		</thead>
		<tbody>
			<?php
				if($actus != NULL){
					foreach($actus as $actu){
						echo '<tr>';
						echo '<td>'.$actu['ACT_titre_actu'].'</td>';
						echo '<td>'.$actu['ACT_text'].'</td>';
						echo '<td>'.$actu['ACT_date'].'</td>';
						echo '</tr>';
					}
				}
				else{
					echo "pas d'actu";
				}
			?>
		</tbody>
	</table>
</h1>