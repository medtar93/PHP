<?php
/* Ce fichier sera inclus dans TOUS les scripts (hors inc eux mêmes) pour initialiser les éléments suivants :
- connexion de la BDD
- créer ou ouvrir une sessoin
- définir le chemin absolu du site (comme dans wordpress)
- inclure le fichier fonction.inc.php à la fin de ce fichier pour l'embarquer dans tous les scripts
*/

// connexion à la BDD
$pdo = new PDO('mysql:host=localhost;dbname=site_commerce',   
                'root',    
                '',    
                array(PDO::ATTR_ERRMODE  => PDO::ERRMODE_WARNING,   
                      PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')   
            );

// créer ou ouvrir une sessoin
session_start();

//définir le chemin absolu du site (comme dans wordpress)
define('RACINE_SITE', '/PHP/07-SITE/');   // cette constante servira à créer les URL ou chemins absolus utilisés dans haut.inc.php car ce fichier sera inclus dans des scripts qui se situent dans des dossiers différents du site. On ne peut donc pas fair e de chemin relatif dans ce fichier.

// Variables d'affichage : 
$contenu = '';
$contenu_gauche ='';
$contenu_droite ='';

// inclusion du fichier fonctions.inc.php :
require_once ('fonctions.inc.php');