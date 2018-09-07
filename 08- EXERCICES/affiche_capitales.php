<?php

/* Sujet :
Vous créez un tableau PHP contenant les pays suivant :
- France
- Italie
- Espagne
- Inconnu
- Allemagne

Vous leur associez les valeurs suivantes :
- Paris
- Rome
- Madrid
- ?
- Berlin

Vous parcourez ce tableau pour afficher la phrase "La capitale X se situe en Y" dans un <p>, où X remplace la capitale et Y la pays.

Pour le pays "inconnu", vous afficherez "La capitale de inconnu n'existe pas !" à la place de la prase précédente.
*/

$pays = ['France' => 'Paris',
        'Italie' => 'Rome', 
        'Espagne' => 'Madrid', 
        'Inconnu' => '?',
        'Allemagne' => 'Berlin'];


echo '<pre>';
    print_r($pays);  
echo '</pre>'; 

foreach ($pays as $indice => $valeur) {
    if ($indice == 'Inconnu') {
        echo '<p>la capitale d\' '.$indice .' n\'existe pas <p>';
    }else {
        echo '<p>la capitale '.$valeur .' se situe en '. $indice .' <p>';
    }
}

