<?php
/* Sujet:

    1-Créer une BDD "restaurants" avec une table "restaurant" :
      id_restaurant PK AI INT(3)
      nom           VARCHAR(100)
      adresse       VARCHAR(255)
      telephone     VARCHAR(10)
      type          ENUM('gastronomique','brasserie','pizzeria','autre')
      note          INT(1)
      avis          TEXT
      
    2-Créer un formulaire HTML (avec doctype ...) afin d'ajouter un restaurant en bdd.Les champs (de 1 à 5) sont des menus déroulants.
    
    3-Effectuer les vérifications nécéssaires :
        Le champ nom contient 2 caractères minimum
        Le champ adresse ne doit pas être vide
        le téléphone doit contenir 10 chiffres
        le type doit être conforme aux type de la BDD
        la notre est un nombre entier entre 0 et 5 
        l'avis ne doit pas être vide 
        En cas d'erreur de saisie afficher un message d'erreur au dessus su formulaire.
        
    4- Ajouter un ou plusieurs restaurants à la BDD et afficher un message de succés ou d'échec lors de l'enregistrement.*/
    print_r($_POST);
    $contenu = '';
    // 1- connexion à la bdd:
    $pdo = new PDO('mysql:host=localhost;dbname=restaurants',
    'root', // pseudo de la BDD
    '',     // mot de passe de la BDD
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,  // option 1 : pour afficher les erreurs SQL
          PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    
        //2- requête SQL
        if(!empty($_POST)) { // si $_POST est rempli c'est que le formulaire est soumis

            //Contrôle sur le formulaire :
                
                if(!isset($_POST['nom']) || strlen($_POST['nom']) < 2 || strlen($_POST['nom']) > 10) $message .= '<div>Le nom doit comporter entre 2 et 100 caractères.</div>';
                
                if(!isset($_POST['adresse']) || strlen($_POST['adresse']) < 2 || strlen($_POST['prenom']) > 255) $message .= '<div>L\'adresse doit comporter entre 2 et 255 caractères.</div>';
               
                if(!isset($_POST['telephone']) || !ctype_digit($_POST['telephone']) || strlen($_POST['telephone'])!== 10 )  $message .= '<div>Le telephone doit être un nombre à 10 chiffres.</div>'; //is_numeric signifie que ça doit être un nombre ou une chaîne numérique.
                
                 if(!isset($_POST['type']) || $_POST['type'] !== 'gastronomique' || $_POST['type'] !== 'brasserie' || $_POST['type'] !== 'gastronomique' ) $message .= '<div>L\'année n\'est pas valide.</div>'; 
                
               

                 if(!isset($_POST['type_contact']) || $_POST['type_contact'] !== 'ami' && $_POST['type_contact'] !== 'famille' && $_POST['type_contact'] !== 'professionnel'&& $_POST['type_contact'] !== 'autre'  ) $message .= '<div>Le type de contact ne correspond pas à la liste</div>';
                
                       // Insertion en BDD si il n'y a pas de message d'erreur : 
                if (empty($message)){ // si $message est vide  c'est qu'il n'y a pas d'erreur
        
                    // On échappe toutes les valeurs de $_POST :
                    foreach($_POST as $indice => $valeur) {
                        $_POST[$indice]= htmlspecialchars($valeur, ENT_QUOTES);
                    }
        
                    // On fait une requête preparée :
                    $resultat= $pdo->prepare("INSERT INTO contact ( nom, prenom, telephone, annee_rencontre, email, type_contact)
                    VALUES ( :nom, :prenom, :telephone, :annee_rencontre, :email, :type_contact)");
        
                    $resultat->bindParam(':nom', $_POST['nom']);
                    $resultat->bindParam(':prenom', $_POST['prenom']);               
                    $resultat->bindParam(':telephone', $_POST['telephone']);
                    $resultat->bindParam(':annee_rencontre', $_POST['annee_rencontre']);               
                    $resultat->bindParam(':email', $_POST['email']);
                    
                    $resultat->bindParam(':type_contact', $_POST['type_contact']);               
                  
                    
                 
                  
                     $req =$resultat->execute();
                     // la methode execute() renvoie un booléen selon que la requête a marché (true) ou  pas (false)               
                     // Afficher un message de réussite ou d'écheque :               
                     if ($req){
        
                        $message .= '<div>Le contact a bien été ajouté .</div>';
        
                    }else {
        
                        $message .= '<div>Une erreur est survenue lors de l\'enregistrement. .</div>';
        
                }//if (empty($message))
    
            }
            }
        

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BDD RESTAURANTS</title>
</head>
<body>
    <h1>Liste des restaurants </h1>
    <form method="post" action="">
    
    <label for="nom">NOM</label><br>
    <input type="text" name="nom"><br><br>

    <label for="adresse">ADRESSE</label><br>
    <textarea rows="3" cols="16" class="" name="adresse">ADRESSE</textarea><br><br>

    <label for="telephone">TELEPHONE</label><br>
    <input type="text" name="telephone"><br><br>

    <label for="type">TYPE</label><br>
    <select name="type" id="type">
    <option value="gastronomique">gastronomique</option>
    <option value="brasserie">brasserie</option>
    <option value="pizzeria">pizzeria</option>
    <option value="autre">autre</option>
    </select><br><br>

    <label for="note">NOTE</label><br>
    <select name="note" id="note">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    </select><br><br>

    <label for="avis">AVIS</label><br>
    <textarea name="avis" id="avis" cols="30" rows="8">Donner votre avis ici ...</textarea>
    <input type="submit" name="ajouter" value="ajouter" class="btn">
        </form>
    
    </form>

    
</body>
</html>