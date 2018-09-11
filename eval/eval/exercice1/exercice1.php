<?php

$info = array(
	'0' 			=> 'Yakine',
	'nom' 				=> 'HAMIDA',
	'adresse' 			=> '142 avenue Jean Jaurès',
	'code_postal' 		=> '93150',
	'ville' 			=> 'Pantin',
	'email' 			=> 'yakine.hamida@evogue.fr',
	'telephone' 		=> '0102030405',
	'date_naissance' 	=> '1981-10-22'
);

// for, while, foreach

echo '<ul>'; 
foreach($info as $indice => $valeur){
	
	if($indice != 'date_naissance'){
		echo '<li>'. ucfirst(str_replace('_', ' ', $indice)) . ' : <strong>' . $valeur . '</strong></li>';
	}
	else{
		$date = new DateTime($valeur);
		echo '<li>' . ucfirst(str_replace('_', ' ', $indice)) . ' : <strong>' . $date -> format("d/m/Y") . '</strong></li>';
	}
}
echo '</ul>';





