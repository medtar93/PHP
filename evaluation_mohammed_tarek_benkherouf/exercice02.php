<?php

if(isset($_POST['convert'])) {
 
    $valeur = $_POST['valeur'];
 
    $resultat = $valeur*0.865;
 
    echo '<p>'.$resultat.'</p>';
 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<h3>convertisseur de dollar en euros</h3>

<form method="POST" name="formulaire">   
    <input type="text" name="valeur" id="valeur">
    <select name="monnaie" id="monnaie">
        <option value="euro">euro vers USD</option>
        <option value="usd"> USD vers euro</option>
    </select>
    <input type="submit" name="validate" value="Envoyer">

</form>
<?php

function conversionEnUsd($nombre) {
     $resultat= $nombre * 1.085965;
     return '<p>'. $nombre .'en euro = ' . $resultat . ' en USD.</p>';
}
function conversionEnEuro($nombre) {
    $resultat= $nombre / 1.085965;
    return '<p>'. $nombre .'en USD = ' . $resultat . ' en euro.</p>';
}
if(empty('valeur')  && 'value' == 'euro') { 
    

}




?>
</body>
</html>