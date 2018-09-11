<?php
	// connexion à la BDD
	$pdo = new PDO('mysql:host=localhost;dbname=exercice_3', 'root', '', array(
		PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
	));

	//Récupérer tous les films : 
	
	$resultat = $pdo-> prepare("SELECT * FROM movies WHERE id_movies = :id");
	$resultat -> bindParam(':id', $_GET['id'], PDO::PARAM_INT);
	$resultat -> execute();
	
	if($resultat -> rowCount() > 0){
		$film = $resultat -> fetch(PDO::FETCH_ASSOC);
		extract($film);
	}
	else{
		header('location:voir_films.php');
	}
	
?>
<h1><?= $title ?></h1>

<ul>
	<li><a href="ajout_film.php">Ajouter Film</a></li>
	<li><a href="voir_films.php">Liste des Films</a></li>
</ul>

<ul>
	<?php foreach($film as $indice => $valeur) : ?>
	<li><?= ucfirst(str_replace('_', ' ', $indice)) ?>  <strong><?= $valeur  ?></strong></li>
	<?php endforeach; ?>
</ul>




