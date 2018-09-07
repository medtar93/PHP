<?php

/* Sujet:
    1- Créer une base de donnée "contacts" avec une table "contact" :
        id_ contact     PK AI INT(3)
        nom             VARCHAR(20)
        prenom          VARCHAR(20)
        telephone       VARCHAR(10)
        annee_rencontre YEAR
        email           VARCHAR(255)  
        type_contact    ENUM('ami', 'famille','professionnel', 'autre').
        
    2- Créer un formulaire HTML (avec Doctype ... ) afin d'ajouter des contacts dans la BDD. Le champ année est un men déroulant de l'année en cours à 100 ans en arrière à rebours, et le type de contact est aussi un menu déroulant.
    
    3- Sur le formulaire, effectuer les contrôles nécessaires :
        -les champs nom et prénom contiennent 2 caractères minimum
        -le champs téléphone contient 10 chiffres
        -l'année de rencontre doit être une année valide
        -le type de contact doit être conforme à la liste des contacts
        -l'email doit être visible
        
    4- Ajouter les contacts à la BDD et afficher un message en cas de succés ou en cas d'échec.
    */
    var_dump($_POST);
    $message = '';
 

    $pdo = new PDO('mysql:host=localhost;dbname=contacts', // driver mysql : serveur ; nom de la BDD
    'root', // pseudo de la BDD
    '',     // mot de passe de la BDD
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,  // option 1 : pour afficher les erreurs SQL
          PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));	// option 2 : définit le jeu de caractères des échanges avec la BDD
    

          if(!empty($_POST)) { // si $_POST est rempli c'est que le formulaire est soumis

            //Contrôle sur le formulaire :
                
                if(!isset($_POST['nom']) || strlen($_POST['nom']) < 2 || strlen($_POST['nom']) > 20) $message .= '<div>Le nom doit comporter entre 2 et 20 caractères.</div>';
                
                if(!isset($_POST['prenom']) || strlen($_POST['prenom']) < 2 || strlen($_POST['prenom']) > 20) $message .= '<div>Le prénom doit comporter entre 2 et 20 caractères.</div>';
               
                if(!isset($_POST['telephone']) || !ctype_digit($_POST['telephone']) || strlen($_POST['telephone'])!== 10 )  $message .= '<div>Le telephone doit être un nombre à 10 chiffres.</div>'; //is_numeric signifie que ça doit être un nombre ou une chaîne numérique.
                
            
                 
                
         
                 if(!isset($_POST['annee_rencontre']) || $_POST['annee_rencontre'] < 1918 || $_POST['annee_rencontre'] > 2018) $message .= '<div>L\'année n\'est pas valide.</div>'; 
                
                 if(!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) $message .= '<div>L\'email n\'est pas valide </div>';

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
        <title>Document</title>
    </head>
    <body>
        <h1>Formulaire</h1>
        <?php  echo $message; ?>
        <form method="post" action="">
        
            <label for="nom">Nom</label><br>
            <input type="text" name="nom" id="nom" value=""><br><br>
            

            <label for="prenom">Prénom</label><br>
            <input type="text" name="prenom" id="prenom" value=""><br><br>
            
            <label for="telephone">téléphone</label><br>
            <input type="text" name="telephone" id="telephone" value=""><br><br>
            
            <label for="annee rencontre">annee rencontre</label><br>
            <select name="annee_rencontre" id="">annee rencontre
        
            <?php
            
                // une boucle fo avec une incrémentation inversée pour partir de 2018 et arrivé à 1918.
            for ($i = 2018; $i >= date('Y')-100; $i--)
            {
            echo '<option value=\'' . $i . '\'>' . $i . '</option>';
            }
            ?>
            
            </select><br>

            <label for="email">Email</label><br>
            <input type="text" name="email" id="email" value=""><br><br>
            
            <select name="type_contact">type de contact
                <option value="ami">amis</option> 
                <option value="famille"> famille</option>
                <option value="professionnel">professionnel</option> 
                <option value="autre">autre</option> 
            </select>
            <br><br>
            <input type="submit" name="inscription" value="s'inscrire" class="btn">
        </form>
    </body>
    </html>