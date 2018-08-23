<?php
require_once 'inc/init.inc.php';

debug($_POST);

//1-Traitement du formulaire :
if (!empty($_POST)){ // si le formulaire est soumis

    // validation des champs: 
    if (!isset($_POST['pseudo']) || empty($_POST['pseudo'])) {
        $contenu .= '<div class="bg-danger">Le pseudo est requis.</div>';
    }
    if (!isset($_POST['mdp']) || empty($_POST['mdp'])) {
        $contenu .= '<div class="bg-danger">Le mot de passe est requis.</div>';
    }

    if (empty($contenu)) { // s'il n'y a pas d'erreur sur le formulaire
        $membre = executeRequete("SELECT * FROM membre WHERE pseudo = :pseudo AND mdp = :mdp",
                array( 'pseudo' => $_POST['pseudo'], ':mdp' => $_POST['mdp']));
                
                if ($membre->rowCount() > 0 ){ // si le nombre de lignes est supérieur à 0, alors le pseudo et le mdp existent ensemble en bdd
                    //on crée une session avec les informations du membre:
                        $information = $membre->fetch(PDO::FETCH_ASSOC); // on fait un fetch pour transformer l'objet $membre en un array associatif qui contient tous les champs de la requête 
                        debug($information);
                        $_SESSION['membre'] = $information; //nous créons une session avec les infos du membre qui proviennent de la BDD

                        header('location:profil.php');
                        exit(); //on redirige l'internaute vers sa page de profil, et on quitte ce scipt avec la fonction exit().

                } else {
                    // sinon c'est qu'il y a une erreur sur les identifiants (ils n'existent pas ou pas pour le même nombre)
                    $contenu .= '<div class="bg-danger">Erreur sur les identifiants</div>';
                }

    } //fin du if (empty($contenu))

}




//-------------------------- AFFICHAGE -----------------------------------
require_once 'inc/haut.inc.php'; // doctype, header, nav
?> 
        <h1 class="mt-4">Connexion</h1>
        <?php echo $contenu; ?>

        <form method="post" action="">
        <label for="pseudo">Pseudo</label><br>
        <input type="text" name="pseudo" id="mdp" value=""><br> <br>
        
        <label for="mdp">Mot de passe</label><br>
        <input type="password" name="mdp" id="mdp" value=""><br> <br>

        <input type="submit" value="Se connecter" class="btn">
        
        </form>




<?php




require_once 'inc/bas.inc.php';