<?php
// Exercice :
/* Vous allez créer la page de gestion des membres dans le back-office :
1- Seul les admin ont accès à cette page. Les autres sont redirigés vers connexion.php
2- Afficher dans cette paage tous les membres inscrits sous forme de table HTML, avec toutes les infos SAUF le mot de passe.
3- Afficher le nombre de membres.

*/

require_once '../inc/init.inc.php';
// 1- on vérifie si membre en admin :
    if (!internauteEstConnecteEtAdmin()) {
        header('location:../connexion.php');   // si pas admin on le redirige vers la page de connexion
        exit();
    }



// 2- Affichage de produits dans le back-office :
// Exercice : afficher tous les produits sous forme de table HTML que vous stockez dans la variable $contenu. Tous les champs doivent être afichés. Pour la photo, afficher une image (de 90px de coté).

$resultat = $pdo->query("SELECT id_membre, pseudo, prenom, nom, email, civilite, ville, code_postal, adresse, statut FROM membre");

$contenu .= '<p><i>Nombre de membres : ' . $resultat->rowCount() . ' </i></p>';

$contenu .= '<table border="1">';
    // La ligne d'entêtes:
    $contenu .= '<tr>';
        $contenu .= '<th>id membre</th>';
        $contenu .= '<th>pseudo</th>';
        $contenu .= '<th>prenom</th>';
        $contenu .= '<th>nom</th>';
        $contenu .= '<th>email</th>';
        $contenu .= '<th>civilite</th>';
        $contenu .= '<th>ville</th>';
        $contenu .= '<th>code postal</th>';
        $contenu .= '<th>adresse</th>';
        $contenu .= '<th>statut</th>';
    $contenu .= '</tr>';

    // affichage des autres lignes :
    while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) {
        //debug($ligne);
        $contenu .= '<tr>';

            foreach ($ligne as $indice => $val) {                
                $contenu .= '<td>' . $val . '</td>';                           
            }

            $contenu .= '<td><a href="?id_membre='. $ligne['id_membre'] .'"onclick="return(confirm(\'Etes-vous certain de vouloir supprimer ce membre ?\'))">supprimer</a></td>';  // $ligne['id_membre] contient l'id de chaque membre à chaque tour de boucle while, ainsi le lien est dynamique, l'id passé en GET change selon le membre sur lequel je clique
        $contenu.= '</tr>';
    }
$contenu .= '<table>';


//----------------------AFFICHAGE-----------------------------
require_once '../inc/haut.inc.php';
?>
    <h1 class="mt-4">Gestion des membres</h1>

  

<?php
echo $contenu;
require_once '../inc/bas.inc.php';