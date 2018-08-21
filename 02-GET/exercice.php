<?php

// Exercice :
/*
   1- Vous créez une page "Profil" qui affiche un nom et un prénom.
   2- Vous y ajoutez un lien en GET "modifier mon profil" et un second "supprimer mon profil".
      Ces liens passent dans l'url à la page exercice.php elle-même que l'on a cliqué sur le lien "modifier mon profil" ou sur le lien "supprimer mon profil". Pensez qu'il faut un indice et une valeur pour chaque action.

   3- Si on a cliqué sur le lien "modifier mon profil", c'est-à-dire que vous avez reçu cette info en GET, vous affichez le message "Vous avez demandé la modification de votre profil", et si c'est la suppession qui est demandée, vous affichez le message "Vous avez demandé la suppression de votre profil".
*/
$message = '';    // variable pour contenir les messages pour l'internaute

// var_dump($_GET);

if (isset($_GET['action']) && $_GET['action'] == 'modifier') {  // il faut vérifier d'abord l'existence de l'indice "action" dans $_GET AVANT d'en vérifier la valeur 
	$message = '<p>Vous avez demandé la modification de votre profil. </p>';
} 


if (isset($_GET['action']) && $_GET['action'] == 'supprimer') {  
	$message = '<p>Vous avez demandé la suppression de votre profil. </p>';
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Profil</title>
</head>
<body>
		<h1>Profil</h1>

		<?php echo $message; ?>

		<p>Nom : DOE</p>
		<p>Prénom : John</p>

		<p><a href="?action=modifier">modifier mon profil</a></p>
		<p><a href="?action=supprimer">supprimer mon profil</a></p>


</body>
</html>