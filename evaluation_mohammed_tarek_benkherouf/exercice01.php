<?php

/* Évaluation pratique PHP
    
    Exercice 1 : « On se présente ! »
    Créer un tableau en PHPcontenant les infos suivantes :
●Prénom
●Nom
●Adresse●
Code Postal
●Ville
●Email
●Téléphone
●Date de naissance au format anglais (YYYY-MM-DD)

A l’aide d’une boucle, afficher le contenu de ce tableau (clés + valeurs) dans une liste HTML.
La date sera affichée au format français (DD/MM/YYYY).

Bonus : Gérer l’affichage de la date de naissance à l’aide de la classe DateTime */



$tableau = [
    "prenom" => "tarek",
    "nom" => "benkherouf",
    "adresse" => "142 avenue jean jaures",
    "code_postal" => "93500",
    "ville" => "pantin",
    "email" => "tarek.benkherouf@lepoles.com",
    "telephone" => "06 00 00 00 00",
    "date_naissance" => "1993-12-25",
];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>liste contact</title>
</head>
<body>

    <ul>
        <?php
            foreach ($tableau as $indice => $valeur) { // => lien entre un indice et sa valeur 
                if( $indice != "date_naissance"){
                    echo '<li>'.ucfirst(str_replace('_',' ',$indice)). ' : <strong>' . $valeur .'</strong></li>';
                }
                else{
                    $date = new DateTime ($valeur);
                  

                    echo '<li>'.ucfirst(str_replace('_',' ', $indice)) . ' : <strong>' . $date -> format("d/m/Y") .'</strong></li>';

                }
                
            
            }
        ?>
    
    </ul>
    
    
</body>
</html>

