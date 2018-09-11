<?php
	// connexion à la BDD
	$pdo = new PDO('mysql:host=localhost;dbname=exercice_3', 'root', '', array(
		PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
	));

	//Récupérer tous les films : 
	
	$resultat = $pdo->query("SELECT * FROM movies");
	$films = $resultat -> fetchAll(PDO::FETCH_ASSOC);
?>

<h1>Voir les films</h1>

<ul>
	<li><a href="ajout_film.php">Ajouter Film</a></li>
	<li><a href="voir_films.php">Liste des Films</a></li>
</ul>



<?php if($resultat -> rowCOunt() > 0) : ?>
	<?php foreach($films as $film) : ?>

		<table border="1">
			<tr>
			<?php foreach($film as $indice => $info) :?>
				<td>
				<?php if($indice == 'video') : ?>
					<iframe height="150" src="<?= str_replace('watch?v=', 'embed/', $info) ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
				<?php else : ?>
					<?= $info ?>
				<?php endif; ?>
				</td>
			<?php endforeach; ?>
				<td><a href="fiche_film.php?id=<?= $film['id_movies'] ?>">Voir la fiche</a></td>
			</tr>
		</table>
	
	
	<?php endforeach; ?>
<?php endif; ?>

