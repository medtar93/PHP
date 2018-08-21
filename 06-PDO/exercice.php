<?php




echo '<h1>Les comerciaux et leur salaire</h1>';
echo'<br>';

/* Exercice :
     -afficher dans une liste <ul><li> le prénom, le nom et le salaire des employés apparetenant au service commercial (un <li> par commercial), en utilisant une requête préparé
     - afficher le nombre de commerciaux.
 */

 //1- connexion à la BDD :
 $pdo = new PDO('mysql:host=localhost;dbname=entreprise', // driver mysql : serveur ; nom de la BDD
			   'root', // pseudo de la BDD
			   '',     // mot de passe de la BDD
			   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,  // option 1 : pour afficher les erreurs SQL
			         PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')	// option 2 : définit le jeu de caractères des échanges avec la BDD
              );
              
//2- on fait la requête :
$service='commercial';

$employe = $pdo->prepare("SELECT prenom, nom, salaire FROM employes WHERE service = :service");
$employe->bindParam(':service', $service);
$employe->execute();
echo 'Nombre de commerciaux :' . $employe->rowCount() . '<br>'; 
echo '<ul>';
    while($donnees=$employe->fetch(PDO::FETCH_ASSOC)){
 
    
        echo '<li>';
            echo $donnees['nom'] . ' ' .$donnees['prenom'] . ' ' . $donnees['salaire'] .'€';
        echo '</li>';
   
  

}
echo '</ul>';

echo '<br>';
//table html----------------------------------------------------
$employe->execute();

echo '<table border="1">';



echo '</table>';
