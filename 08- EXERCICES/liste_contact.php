<?php
/* 
    Sujet :
    1-Afficher une table HTML (avec doctype ...) la liste des contacts avec les champs nom, prenom, et téléphone, et un champ supplementaire"autre infos" qui est un lien qui permet d'afficher le detail de chaque contact. 
  
    2- Afficher sous la table HTML le detail du contact quand on clique sur son lien " autre infos ".

*/
$contenu = '';
// 1- connexion à la bdd:
$pdo = new PDO('mysql:host=localhost;dbname=contacts',
'root', // pseudo de la BDD
'',     // mot de passe de la BDD
array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,  // option 1 : pour afficher les erreurs SQL
      PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

//2- requête SQL
$resultat = $pdo->query("SELECT id_contact, nom, prenom, telephone FROM contact");

$contenu .= '<p><i>Nombre de contact : ' . $resultat->rowCount() . ' </i></p>';

$contenu .= '<table border="1">';
    // La ligne d'entêtes:
    $contenu .= '<tr>';
        
        $contenu .= '<th>nom</th>';
        $contenu .= '<th>prenom</th>';
        $contenu .= '<th>téléphone</th>';
        $contenu .= '<th>autres infos</th>';
       
    $contenu .= '</tr>';

    // affichage des autres lignes :
    while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) {
        
        $contenu .= '<tr>';
                
                // affiche chaque ligne $ligne dans une cellule du 
                $contenu .= '<td>' . $ligne['nom'] . '</td>'; 
                $contenu .= '<td>' . $ligne['prenom'] . '</td>';
                $contenu .= '<td>' . $ligne['telephone'] . '</td>';
                $contenu .= '<td><a href="?id_contact='. $ligne['id_contact'] . '">autres infos</a></td>';  
        $contenu.= '</tr>';
    }
    $contenu .= '<table>';
//traitement du $_GET :
var_dump($_GET);

if(isset($_GET['id_contact'])){ //si existe l'indice "id_contact" dans $_GET, c'est que cet indice est passé dans l'url, donc que l'internaute a cliqué sur un des lien "autres infos

    $_GET['id_contact'] = htmlspecialchars( $_GET['id_contact'], ENT_QUOTES); // pour se prémunir des injections css ou js via l'URL.
   
    $resultat= $pdo->prepare("SELECT * FROM contact WHERE id_contact = :id_contact");
    $resultat->bindParam(':id_contact', $_GET['id_contact']);
    $resultat->execute();      
    $contact = $resultat->fetch(PDO::FETCH_ASSOC); //on transforme l'objet $resultat en un array associatif $contact. Pas de boucle car on n'a qu'un seul résultat ici

    // print_r($contact);
    if (!empty($contact)){
   /*  foreach ($contact as $valeur) {
        $contenu .= '<p>'.$valeur.'</p>';
    } */
        $contenu .= '<p>Nom :' . $contact['nom'] . '</p>';
        $contenu .= '<p>Prénom :' . $contact['prenom'] . '</p>';
        $contenu .= '<p>Téléphone' . $contact['telephone'] . '</p>';
        $contenu .= '<p>Email' . $contact['email'] . '</p>';
        $contenu .= '<p>Année de rencontre' . $contact['annee_rencontre'] . '</p>';
        $contenu .= '<p>Type de contact' . $contact['type_contact'] . '</p>';
    } else {
        $contenu .= '<p>Ce contact n\'existe pas</p>';
    }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>liste contact</title>
</head>
<body>

    <?php echo $contenu; ?>
    
    
</body>
</html>
