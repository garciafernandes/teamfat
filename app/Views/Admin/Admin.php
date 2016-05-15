<div class='row'>
	<div class="col-md-3">
	<p>Administration</p>
	<a href="<?=DIR;?>profil">Gestion des profil</a><br>
	<a href="<?=DIR;?>recette">Gestion des recettes</a><br>
	<a href="<?DIR;?>recette/ajout">Ajout d'une nouvelle recette</a><br>

	</div>
	
	<div class="col-md-9">
		<table>
		<tr><th>Nom</th><th>Etapes</th><th>Categorie</th><th>Temps</th><th>Budget</th></tr>
		<?php 
			
			foreach ($recettes as $recettes) {
				echo '<tr>';
				echo '<td>'.$recettes->nom.'</td>';
				echo '<td>'.$recettes->etapes.'</td>';
				echo '<td>'.$recettes->categorie.'</td>';
				echo '<td>'.$recettes->temps.'</td>';
				echo '<td>'.$recettes->budget.'</td>';
				echo '<td><a href="#"> Edit</a><a href="#"> Delete</a></td>';
			}
			echo '</tr>';
		?>
		</table>
	</div>
</div>