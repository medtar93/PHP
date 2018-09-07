<?php
require_once '../inc/init.inc.php';
// 1- on vérifie si membre en admin :
    if (!internauteEstConnecteEtAdmin()) {
        header('location:../connexion.php');   // si pas admin on le redirige vers la page de connexion
        exit();
    }

// 3- Suppression d'un produit :
debug($_GET);

if (isset($_GET['id_produit'])) {
    $resultat = executeRequete("DELETE FROM produit WHERE id_produit = :id_produit", array(':id_produit' => $_GET['id_produit']));

    if ($resultat->rowCount() == 1) {  //Si j'ai une ligne dans $resultat, j'i supprimé une ligne
        $contenu .= '<div class="bg-success">Le produit a bien été supprimé !</div>';
    } else {
        $contenu .= '<div class="bg-danger">Erreur lors de la suppression du produit !</div>';
    }
}


// 2- Affichage de produits dans le back-office :
// Exercice : afficher tous les produits sous forme de table HTML que vous stockez dans la variable $contenu. Tous les champs doivent être afichés. Pour la photo, afficher une image (de 90px de coté).

$resultat = $pdo->query("SELECT * FROM produit");

$contenu .= '<table border="1">';
    // La ligne d'entêtes:
    $contenu .= '<tr>';
        $contenu .= '<th>id produit</th>';
        $contenu .= '<th>reference</th>';
        $contenu .= '<th>categorie</th>';
        $contenu .= '<th>titre</th>';
        $contenu .= '<th>description</th>';
        $contenu .= '<th>couleur</th>';
        $contenu .= '<th>taille</th>';
        $contenu .= '<th>public</th>';
        $contenu .= '<th>photo</th>';
        $contenu .= '<th>prix</th>';
        $contenu .= '<th>stock</th>';
        $contenu .= '<th>action</th>';
    $contenu .= '</tr>';

    // affichage des autres lignes :
    while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) {
        //debug($ligne);
        $contenu .= '<tr>';
            foreach ($ligne as $indice => $val) {
                if ($indice == 'photo') {
                    $contenu .= '<td><img src="../'.$val.'" width="90" alt="'. $ligne['titre'].'" ></td>';                
                } else {
                    $contenu .= '<td>' . $val . '</td>';
                }           
            }
            $contenu .= '<td><a href="?id_produit='. $ligne['id_produit'] .'"onclick="return(confirm(\'Etes-vous certain de vouloir supprimer ce produit ?\'))">supprimer</a></td>';  // $ligne['id_produit] contient l'id de chaque procuit à chaque tour de boucle while, ainsi le lien est dynamique, l'id passé en GET change selon le produit sur lequel je clique
        $contenu.= '</tr>';
    }

$contenu .= '<table>';






//----------------------AFFICHAGE-----------------------------
require_once '../inc/haut.inc.php';
?>
    <h1 class="mt-4">Gestion boutique</h1>

    <ul class="nav nav-tabs" >
        <li><a class="nav-link active" href="gestion_boutique.php">Affichage des produits</a></li>
        <li><a class="nav-link" href="ajout_produit.php">Ajout d'un produit</a></li>
    </ul>



<?php
echo $contenu;
require_once '../inc/bas.inc.php';