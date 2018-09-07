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
        <form method="post" action="">
        
		<label for="nom">Nom</label><br>
		<input type="text" name="nom" id="nom" value=""><br><br>

		<label for="prenom">Prénom</label><br>
		<input type="text" name="prenom" id="prenom" value=""><br><br>
        
        <label for="telephone">téléphone</label><br>
		<input type="text" name="telephone" id="telephone" value=""><br><br>

        <select name="" id="">annee rencontre
        <br>
        <?php
        <?php
      
        for ($i = 2018; $i > 1918 ; $i++)
        {
          echo '<option value=\'' . $i . '\'>' . $i . '</option>'
        }
        ?>
        
        ?>

		<label for="email">Email</label><br>
		<input type="text" name="email" id="email" value=""><br><br>
        
		<label>type de contact</label>
		<input type="radio" name="ami" value="ami" checked> amis
		<input type="radio" name="famille" value="famille"> famille
        <input type="radio" name="professionnel" value="professionnel"> professionnel
        <input type="radio" name="autre" value="autre"> autre
        <br><br>

		

		<input type="submit" name="inscription" value="s'inscrire" class="btn">
        </form>
    </body>
    </html>