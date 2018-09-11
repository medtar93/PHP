<?php


echo '<h1>Convertisseur Euro > Dollar</h1>';

//exécution : 
echo conversion(10, 'EUR');



//déclaration : 
function conversion($montant, $devise){	
	if(is_numeric($montant)){
		
		if($devise == 'USD' || $devise == 'EUR'){
			$taux = 1.085965;
			
			// calcul : 
			return ($devise == 'USD') ? round($montant * $taux, 2) . '$' : round($montant / $taux, 2) . '€';
			
			// La même chose en version standard
			// if($devise == 'USD'){
				// return $montant * $taux;
			// }
			// else{
				// return $montant / $taux;
			// }
		}
		else{
			return '<span style="color:red">Veuillez sélectionner USD ou EUR</span>';
		}
	}
	else{
		return '<span style="color:red">Veuillez renseigner un chiffre</span>';
	}
}


// Version en lien avec le formulaire
if($_POST){ // Si le formulaire est activé
	echo '<br/>' . conversion($_POST['montant'], $_POST['devise']);
}

?>

<h2>Avec un formulaire</h2>
<form method="post" action="">
	<input type="text" name="montant" placeholfer="Votre montant"/>
	<select name="devise">
		<option value="USD">Dollar</option>
		<option value="EUR">Euro</option>
	</select>
	<br/>
	<input type="submit" value="Convertir"/>
</form>













