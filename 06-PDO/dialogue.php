<?php
//-------------------------
//CAS PRATIQUE
//-------------------------

//Objectif : créer un pour poster des commentaires sécuriser.

/* Créer une BDD : dialogue
    Table        : commentaire
    Champs       : id_commentaire INT(3) PK - AI
                    pseudo                  VARCHAR(20)
                    message                 TEXT
                    date enregistrement     DATETIME

*/
var_dump($_POST);
?>
<!-- I. formulaire de saisie des messages -->
<h1>Votre message </h1>
<form method="post" action="">
    <label for="pseudo">pseudo</label><br>
    <input type="text" id="pseudo" name="pseudo" value=""><br>

    <label for="message">Message</label><br>
    <textarea name="message" id="message"></textarea><br>

    <input type="submit" name="envoi" value="envoyer">

</form>