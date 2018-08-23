<?php
require_once 'inc/init.inc.php';

$inscription = false; // pour savoir si l'internaute vient de s'inscrire (on mettra la variable à true) et ne plus afficher le formulaire d'incription 

//

var_dump($_POST);

//Taitement du formulaire :

if (!empty($_POST)) { //si le formulaire est soumis

    //Validation des champs du formulaire :
        if(!isset($_POST['pseudo']) || strlen($_POST['pseudo']) < 4 || strlen($_POST['pseudo']) > 20) $contenu .= '<div class="bg-danger">le nom doit contenir entre 2 et 20 caractères.</div>';

        if(!isset($_POST['prenom']) || strlen($_POST['prenom']) < 4 || strlen($_POST['prenom']) > 20) $contenu .= '<div class="bg-danger">le prenom doit contenir entre 2 et 20 caractères.</div>';
      
        if(!isset($_POST['ville']) || strlen($_POST['ville']) < 4 || strlen($_POST['ville']) > 20) $contenu .= '<div class="bg-danger">la ville doit contenir entre 2 et 20 caractères.</div>';
       
        if(!isset($_POST['civilite']) ||($_POST['civilite']) != 'm' && ($_POST['civilite']) != 'f' ) $contenu .= '<div class="bg-danger">La civilité est incorrecte.</div>';

        if(!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ) $contenu .= '<div class="bg-danger">Email incorrect.</div>'; // filter_var() avec l'argument FILTER_VALIDATE_EMAIL valide que ($_POST['email']) est bien au format d'un email. Notez que cela marche aussi pour valider les URL avec  FILTER_VALIDATE_URL.
        if(!isset($_POST['code_postal']) || !ctype_digit($_POST['code_postal']) || strlen($_POST['code_postal']) != 5) $contenu .= '<div class="bg-danger">code postale incorrect.</div>'; //la fonction ctype_digit() permet de vérifier qu'un string  contient un nombre entier (utilisé pour les formulaires qui ne retournent que des strings avec le type "text")


        //------------
        //Si pas d'erreur sur le formulaire, on verifie que le pseudo est disponible sans la BDD :
            if (empty($contenu)) { // si $contenu est vide, c'est qu'il n'y pas d'erreur 
                
                //Verification du pseudo 
                $membre = executeRequete("SELECT * FROM membre WHERE pseudo = :pseudo", array(':pseudo' =>$_POST['pseudo'])); //on selectionne en base les éventuels membres dont le pseudo correspond au pseudo donné par l'internaute llors de l'inscription

               if ($membre->rowCount() > 0) { // si la requête retourne 1 ou  plusieurs résultats c'est que le pseudo existe en BDD
                    $contenu .= '<div class="bg-danger">Le pseudo est indisponible. Veuillez en choisir un autre.</div>';
               } else {
                   //sinon, le pseudo étant disponible, on enregistre le membre en BDD :
                   executeRequete("INSERT INTO membre (pseudo, mdp, nom, prenom, email, civilite, ville, code_postal, adresse, statut) VALUES (:pseudo, :mdp, :nom, :prenom, :email, :civilite, :ville, :code_postal, :adresse, 0) ",array(
                                                                                        ':pseudo'        => $_POST['pseudo'],
                                                                                        ':mdp'           => $_POST['mdp'],
                                                                                        ':nom'           => $_POST['nom'],
                                                                                        ':prenom'        => $_POST['prenom'],
                                                                                        ':email'         => $_POST['email'],
                                                                                        ':civilite'      => $_POST['civilite'],
                                                                                        ':ville'         => $_POST['ville'],
                                                                                        ':code_postal'   => $_POST['code_postal'],
                                                                                        ':adresse'       => $_POST['adresse'], 
                   ));
                   $contenu .= '<div class="bg-success">Vous êtes inscrit à notre site.<a href="connexion.php">connexion</a></div>';
                   $inscription = true;
               }

            }

}


//-------------------------- AFFICHAGE -----------------------------------
require_once 'inc/haut.inc.php'; // doctype, header, nav
echo $contenu; // pour afficher les messages à l'internaute
?>
    <h1 class="my-4">Inscription</h1>
<?php
if (!$inscription) : //nous entrons dans la condition si !$inscription vaut false


?>

    <p>Veuillez renseigner le formulaire pour vous inscrire.</p>

    <form method="post" action="">
        

        <label for="pseudo">Pseudo</label><br>
        <input type="text" name="pseudo" id="mdp" value=""><br> <br>
        
        <label for="mdp">Mot de passe</label><br>
        <input type="text" name="mdp" id="mdp" value=""><br> <br>
        
        <label for="pseudo">nom</label><br>
        <input type="text" name="nom" id="nom" value=""><br> <br>

        <label for="pseudo">Prénom</label><br>
        <input type="text" name="prenom" id="prenom" value=""><br> <br>

        <label for="pseudo">Email</label><br>
        <input type="text" name="email" id="email" value=""><br> <br>

        <label for="pseudo">Civilité</label><br>
        <input type="radio" name="civilite"  value="m" checked>Homme
        <input type="radio" name="civilite"  value="f">Femme <br><br>

        <label for="pseudo">Ville</label><br>
        <input type="text" name="ville" id="ville" value=""><br> <br>

        <label for="pseudo">Code Postal</label><br>
        <input type="text" name="code_postal" id="code_postal" value=""><br> <br>

        <label for="pseudo">Adrese</label><br>
        <textarea name="adresse" id="adresse" cols="30" rows="10"></textarea><br> <br>

        <input type="submit" name="inccription"  value="s'incrire" class="btn">
    </form>
    <?php 
    endif;


    
require_once 'inc/bas.inc.php'; 