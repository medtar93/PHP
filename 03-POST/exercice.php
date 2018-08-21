<?php
// Exercice :
/* 
	- Créer un formulaire avec les champs ville et code postal, et une zone de texte adresse.
	- Vous envoyez les données saisies par l'internaute dans exercice-traitement.php.
	  Vous y affichez ces saisies en précisant l'étiquette correspondante. 

*/


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>formulaire</title>
</head>
<body>
	<h1>Formulaire</h1>
	
	<form method="post" action="exercice-traitement.php">
		<div>
			<label for="ville">Ville</label>		
			<input type="text" name="ville" id="ville" value="">
		</div>
		<div>
			<label for="cp">Code postal</label>		
			<input type="text" name="cp" id="cp" value="">
		</div>
		<div>
			<label for="adresse">Adresse</label>
			<textarea name="adresse" id="adresse"></textarea>
		</div>
		<div>
			<input type="submit" name="validation" value="envoyer">
		</div>
	</form>
	
</body>
</html>



