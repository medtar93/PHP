<?php

	// connexion à la BDD
	$pdo = new PDO('mysql:host=localhost;dbname=exercice_3', 'root', '', array(
		PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
	));

	$erreur = ''; 

	if($_POST){ // si lme fomulaire est activé
	
		
		if(!empty($_POST['title'])){
			
			if(strlen($_POST['title']) > 255 || strlen($_POST['title']) < 5){
				$erreur .= '<span style="color:red">Veuillez sélectionner un titre de 255 caractères MAX et 5 caractères MIN</span><br/>';
			}
		}
		else{
			$erreur .= '<span style="color:red">Veuillez sélectionner un titre</span><br/>';
		}
	
		if(!FILTER_VAR($_POST['video'], FILTER_VALIDATE_URL)){
			$erreur .= '<span style="color:red">Veuillez renseigner unlien pour la bande annonce</span><br/>';
		}
		
		
		if(empty($erreur)){ // tous les voyants sont au vert, pas d'erreur dans les saisies du formulaire
			
			$resultat = $pdo -> prepare("INSERT INTO movies (title, actors, director, producer, year_of_prod, language, category, storyline, video ) VALUES (:title, :actors, :director, :producer, :year_of_prod, :language, :category, :storyline, :video ) ");
			
			$resultat -> bindParam(':title', $_POST['title'], PDO::PARAM_STR);
			$resultat -> bindParam(':actors', $_POST['actors'], PDO::PARAM_STR);
			$resultat -> bindParam(':director', $_POST['director'], PDO::PARAM_STR);
			$resultat -> bindParam(':producer', $_POST['producer'], PDO::PARAM_STR);
			$resultat -> bindParam(':year_of_prod', $_POST['year'], PDO::PARAM_STR);
			$resultat -> bindParam(':language', $_POST['language'], PDO::PARAM_STR);
			$resultat -> bindParam(':category', $_POST['category'], PDO::PARAM_STR);
			$resultat -> bindParam(':storyline', $_POST['storyline'], PDO::PARAM_STR);
			$resultat -> bindParam(':video', $_POST['video'], PDO::PARAM_STR);
			
			if($resultat -> execute()){
				echo '<p style="color:green">Le film est enregistré</p>';
			}
			
			
			
		}
		
		
		
	
	
	}




?>



<h1>Ajouter un film</h1>

<ul>
	<li><a href="ajout_film.php">Ajouter Film</a></li>
	<li><a href="voir_films.php">Liste des Films</a></li>
</ul>


<?= $erreur ?>
<?php //echo $erreur; ?>
<form method="post" action="">

	<input type="text" name="title" placeholder="Titre du film"/><br/><br/>
	<input type="text" name="actors" placeholder="Liste des acteurs"/><br/><br/>
	<input type="text" name="director" placeholder="Réalisateur"/><br/><br/>
	<input type="text" name="producer" placeholder="Producteur"/><br/><br/>
	
	<select name="year">
		<option>Année de sortie</option>
		<?php
			$i = date('Y'); //2018
			while($i >= date('Y') - 100){ //1918
				echo '<option>' . $i . '</option>'; 
				$i --; 
			}
		?>
	</select><br/><br/>
	
	<input type="text" name="language" placeholder="Langue du film"/><br/><br/>
	
	<select name="category">
		<option>action</option>
		<option>aventure</option>
		<option>drame</option>
		<option>comedie</option>
	</select><br/><br/>
	
	<textarea name="storyline" placeholder="Synopsis"></textarea><br/><br/>
	
	<input name="video" type="text" placeholder="Lien de la bande annonce" /><br/><br/>
	
	<input type="submit" value="Enregistrer le film" />
	
	
	

</form>