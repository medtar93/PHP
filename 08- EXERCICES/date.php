<?php
/* Sujet:
    -Créer une fonction qui permet de convertir une date FR en date US, ou inversement.
    Cette fonction prend 2 paramatres : une date et le format de conversion "US" ou "FR".

    Vous validez que le paramètre du format sortie est bien "US" ou "FR". La fonction retourne un message si ce n'est pas le cas.
*/
// Préambule à l'exercice :

/* $aujoudhui = date('d-m-Y'); //donne la date du jour au format indiqué
echo $aujoudhui . '<br>'; */

//----

//Convertir une date d'un format vers un autre:
   /*  $date = '2018-08-24';
    echo 'La date au format US : ' .$date. '<br>'; */

    /* $objetDate = new DateTime($date);
    echo 'La date au format FR : ' . $objetDate->format('d-m-Y').'<br>'; */

    //Votre exercice
  
    function convertirDate($date, $format) {
        if($format != "US" && $format != "FR"){
            return '<p>Oups! Il y a une erreur de format dans votre saisie.</p>';
        } else {
            if($format == "US"){
                $objetDate = new DateTime($date);
                return 'La date  au format '. $format .' : ' . $objetDate->format('Y-m-d'). '.<br>';
            } else {
                $objetDate = new DateTime($date);
                return 'La date au format ' . $format .' : ' . $objetDate->format('d-m-Y'). '.<br>';
            }
        }

    }

    
    echo convertirDate('2018-04-28' , "FR");
    echo convertirDate('24-04-2018' , "US");
    echo convertirDate('24-04-2018' , "UK");
    

   
