<?php

function ($montant, $devise) {

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

</body>
</html>