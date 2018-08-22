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

//II. Connexion à la BDD et traitement de $_POST
$pdo = new PDO('mysql:host=localhost;dbname=dialogue', // driver mysql : serveur ; nom de la BDD
			   'root', // pseudo de la BDD
			   '',     // mot de passe de la BDD
			   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,  // option 1 : pour afficher les erreurs SQL
			         PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')	// option 2 : définit le jeu de caractères des échanges avec la BDD
              );
              


if (!empty($_POST)) {  // signifie si le formulaire est remplie

    //Traitement contre les failles JS (XSS)ou les failles CSS : on parle d'echapement de donées reçues:
    // on comence par mettre du code CSS dans le champ "message" : <style>body{display:none;}<style>
    //Pour s'en premunir : 
    $_POST['pseudo'] = htmlspecialchars($_POST['pseudo'], ENT_QUOTES); // convertit les caractères sépciaux (<,>,&,"",'') en entités HTML (exemple : le< devient &alt) cequi neutralise les balises HTML. on parle d'échappement des données reçues.
    $_POST['message'] = htmlspecialchars($_POST['message'], ENT_QUOTES);

    // Insertion du commentaire en BDD : nous alons faire une première requête qui n'est pas protégée contre les injections et qui n'accepte pas les apostrophes:
    
    /* $resultat= $pdo->query("INSERT INTO commentaire (pseudo, date_enregistrement, message)
                             VALUES ('$_POST[pseudo]', NOW() , '$_POST[message]')"); */
    
    // nous faisons l'injection SQL suivante dans le champ "message":   ok');DELETE FROM commentaire;(
      
        //Pour se prémunir des requêtes SQL, npis faison une requête préparée. Par ailleurs, elle permettra la saisie d'appostrophe par l'internaute

        $resultat= $pdo->prepare("INSERT INTO commentaire (pseudo, date_enregistrement, message)
        VALUES (:pseudo, NOW(), :message)");

        $resultat->bindParam(':pseudo', $_POST['pseudo']);
        $resultat->bindParam(':message', $_POST['message']);

        $resultat->execute();
        //comment ca marche ? le fait de mettre des marqueur dans la requette permet de ne pas concataner des insctruction sql avec des injectiond sql. par ailleur on fesnt un un bindParam(), les instructions SQL sont dissociées les unes des autres et neutralisées par PDO qui les transforment en strings inoffensifs. en effet, le SGBD attends des valeurs à la place des marqueurs dont il sait qu'elles ne sont pas du code à éxécuter.

        

}
print_r($_POST);
?>




<!-- I. formulaire de saisie des messages -->
<h1>Votre message </h1>
<form method="post" action="">
    <label for="pseudo">pseudo</label><br>
    <input type="text" id="pseudo" name="pseudo" value="<?php echo $_POST['pseudo']??''; ?>"><br> <!-- l'opérateur "??" en PHP7 signifie "prend le premier qui existe.". Ici on affiche donc $_POST['pseudo'] si il existe sion un string vide -->

    <label for="message">Message</label><br>
    <textarea name="message" id="message"><?php echo $_POST['message']??''; ?></textarea><br>

    <input type="submit" name="envoi" value="envoyer">

</form>

<?php 
//III.Affichage des messages :
$resultat= $pdo->query("SELECT pseudo, message, DATE_FORMAT(date_enregistrement, '%d/%m/%Y') AS datefr, DATE_FORMAT(date_enregistrement, '%h:%i/%s') AS heurefr FROM commentaire ORDER BY date_enregistrement DESC  ");

echo '<h2>' . $resultat->rowCount() . 'commentaires </h2>';

while ($commentaire = $resultat->fetch(PDO::FETCH_ASSOC)){
    // var_dump($commentaire);

    echo '<p>PAR ' .$commentaire['pseudo'] . ' le ' .$commentaire['datefr'] . 'à' .$commentaire['heurefr'] . '</p>';
    echo '<p>' . $commentaire['message'] . '</p><hr>';
}
//Conclusion : faire systématiquement sur les données revues : htmlspecialchars() et une requête péparée !