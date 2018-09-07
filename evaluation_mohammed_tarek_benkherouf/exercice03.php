<?php
 var_dump($_POST);
 $message = '';

 $pdo = new PDO('mysql:host=localhost;dbname=exercice_3', // driver mysql : serveur ; nom de la BDD
    'root', // pseudo de la BDD
    '',     // mot de passe de la BDD
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,  // option 1 : pour afficher les erreurs SQL
          PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));	// option 2 : définit le jeu de caractères des échanges avec la BDD

          if(!empty($_POST)) { // si $_POST est rempli c'est que le formulaire est soumis

            //Contrôle sur le formulaire :
                
                if(!isset($_POST['title']) || strlen($_POST['title']) < 5 || strlen($_POST['title']) > 255) $message .= '<div>Le "title" doit comporter entre 5 et 255 caractères.</div>';
                
                if(!isset($_POST['actors']) || strlen($_POST['actors']) < 5 || strlen($_POST['actors']) > 255) $message .= '<div>"actors" doit comporter entre 5 et 255 caractères.</div>';
               
                if(!isset($_POST['director']) || strlen($_POST['director']) < 5 || strlen($_POST['director']) > 255 ) $message .= '<div>"director" doit comporter entre 5 et 255 caractères. </div>';
                
                if(!isset($_POST['producer']) || strlen($_POST['producer']) < 5 || strlen($_POST['producer']) > 255) $message .= '<div>"producer" doit comporter entre 5 et 255 caractères.</div>';

                if(!isset($_POST['year_of_prod']) || $_POST['year_of_prod'] < 1918 || $_POST['year_of_prod'] > 2018) $message .= '<div>L\'année n\'est pas valide.</div>'; 

                if(!isset($_POST['language']) || $_POST['language'] == 'français' ||$_POST['language']== 'english' ||$_POST['language']== 'italiano' ||$_POST['language']== 'deutsch' ||$_POST['language']== 'espanol' ||$_POST['language']== 'العربية') $message .= '<div>"language" doit dit correspondre à la liste proposée.</div>';

                if(!isset($_POST['category']) || $_POST['category'] == 'action' ||$_POST['category']== 'aventure' ||$_POST['category']== 'drame' ||$_POST['category']== 'comedie' ) $message .= '<div>"category" doit dit correspondre à la liste proposée.</div>';

                if(!isset($_POST['storyline']) || strlen($_POST['storyline']) < 5 || strlen($_POST['storyline']) >800) $message .= '<div>"storyline" doit comporter entre 5 et 800 caractères.</div>';

                if (!preg_match('#^(http|https)://[\w-]+[\w.-]+\.[a-zA-Z]{2,6}#i', $_POST['video'])) $message .="MonURL n'est pas valide";://On vérifie avec les expressions régulières que la chaîne $monUrl commence par 'http://' ou 'https://' et l'on vérifie qu'elle se termine par un point suivi de 2 à 6 lettres.
                    }
                       // Insertion en BDD si il n'y a pas de message d'erreur : 
                    if (empty($message)){ // si $message est vide  c'est qu'il n'y a pas d'erreur
        
                        // On échappe toutes les valeurs de $_POST :
                        foreach($_POST as $indice => $valeur) {
                            $_POST[$indice]= htmlspecialchars($valeur, ENT_QUOTES);
                        }
            
                        // On fait une requête preparée :
                        $resultat= $pdo->prepare("INSERT INTO movies ( title, actors, director, producer, year_of_prod, language, category, storyline, video)
                        VALUES ( :title, :actors, :director, :producer, :year_of_prod, :language, :category, :storyline, :video)");
            
                        $resultat->bindParam(':title', $_POST['title']);
                        $resultat->bindParam(':actors', $_POST['actors']);
                        $resultat->bindParam(':director', $_POST['director']);
                        $resultat->bindParam(':producer', $_POST['producer']);
                        $resultat->bindParam(':year_of_prod', $_POST['year_of_prod']);
                        $resultat->bindParam(':language', $_POST['language']);
                        $resultat->bindParam(':category', $_POST['category']); 
                        $resultat->bindParam(':storyline', $_POST['soryline']);
                        $resultat->bindParam(':video', $_POST['video']);               

                        $req =$resultat->execute();
                        // la methode execute() renvoie un booléen selon que la requête a marché (true) ou  pas (false)               
                        // Afficher un message de réussite ou d'écheque :               
                        if ($req){
            
                            $message .= '<div>Le film a bien été ajouté .</div>';
            
                        }else {
            
                            $message .= '<div>Une erreur est survenue lors de l\'enregistrement. .</div>';
            
                        }
        
                     }//if (empty($message))
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>exercice03</title>
</head>
<body>
    <h1>ADD MOVIES</h1>
        <label for="title">title</label>
        <input type="text" name="title" id="title" value=""><br><br>
    
        <label for="actors">actors</label>
        <input type="text" name="actors" id="actors" value=""><br><br>

        <label for="director">director</label>
        <input type="text" name="director" id="director" value=""><br><br>

        <label for="producer">producer</label>
        <input type="text" name="producer" id="producer" value=""><br><br>
        
        <label for="language">year of production</label>
        <select name="year_of_prod" id="year_of_prod">
        <?php
        
      
        for ($i = 2018; $i >= date('Y')-100; $i--)
        {
          echo '<option value=\'' . $i . '\'>' . $i . '</option>';
        }
        ?>
        </select><br><br>

        <label for="language">language</label>
        <select name="language" id="language">
            <option value="francais">français</option>
            <option value="english">english</option>
            <option value="italiano">italiano</option>
            <option value="deutsch">deutsch</option>
            <option value="espanol">espanol</option>
            <option value="arabic">العربية</option>
        </select><br><br>

        <label for="category">category</label>
        <select name="category" id="category">
            <option value="action">action</option>
            <option value="aventure">aventure</option>
            <option value="drame">drame</option>
            <option value="comedie">comedie</option>
        </select><br><br>

        <label for="storyline">storyline</label><br>
        <textarea name="storyline" id="storyline" cols="30" rows="10">resume movie</textarea><br><br>
        
        <label for="video">video</label>
        <input type="text" name="video" id="video" value=""><br><br>

        <input type="submit" name="add" value="add" class="btn">
        
    <form method="post">

    
    
    
    
    
    
    
    
    </form>
</body>
</html>