<p> Ajouter une nouvelle recette </p>

<form action="" method="POST">
		<p>Nom de recette :
		<input type="text" name="nom"/></p>
		<p>Etapes: 
		<textarea type="text" name="etapes"></textarea></p>
		<p>Categorie: 
		<select name='categorie-recette'>
			<option>Entrée</option>
			<option>Plat</option>
			<option>Dessert</option>
		</select></p>
		<p>Temps : 
		<input type="text" name="temps"/></p>
		<p>Budget :
		<input type="text" name="budget" placeholder="ex 1€..."/></p>
		<p>Medias</p>
		<input type='submit' name="submit" value='Validez'/></form>