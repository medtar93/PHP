<style>
	h2 { font-size: 15px; color: orange; }
	body { margin-bottom: 200px; }
</style>


<?php
//------------------------------------
echo '<h2> Les balises PHP </h2>';
//------------------------------------
?>

<?php
// pour ouvrir un passage en PHP, on utilise la balise précédente
// pour fermer un passage en PHP, on utilise la balise suivante :
?>

<p>Bonjour</p>  <!-- en dehors des balises d'ouverture et de fermeture de PHP, nous pouvons écrire du HTML -->

<?php
// Vous n'êtes pas obligé de fermer un passage en PHP en fin de script.


//------------------------------------
echo '<h2> Affichage dans le navigateur </h2>';
//------------------------------------

// echo est une instruction qui permet d'afficher dans le navigateur. Notez que nous pouvons y mettre du HTML.

// Toutes les instructions se terminent par un ";".

print 'Nous sommes lundi <br>';  // autre instruction d'affichage

// Deux autres instructions d'affichage existent (nous les verrons plus loin) :
print_r('message');
echo '<br>';
var_dump('message');


// pour faire un commentaire PHP sur une seule ligne

/*
   pour faire un commentaire
   sur plusieurs lignes
*/


//------------------------------------
echo '<h2> Variable : déclaration, affectation et type </h2>';
//------------------------------------
// Une variable est un espace mémoire portant un nom et permettant de conserver une valeur.
// En PHP, on déclare une variable avec le signe $.

$a = 127;   // on déclare la variable $a et lui affecte la valeur 127
echo gettype($a);  // gettype() est une fonction prédéfinie qui retourne le type d'une variable. Ici un integer (entier)
echo '<br>';

$a = 'une chaîne de caractères';
echo gettype($a);  // string
echo '<br>';

$b = '127';
echo gettype($b);  // un nombre écrit entre quotes ou guillemets est interprété comme un string
echo '<br>';

$a = true;   // true ou bien false
echo gettype($a);  // boolean
echo '<br>';

// par convention, un nom de variable commence par une minuscule, puis on met une majuscule à chaque mot. Il peut contenir des chiffres (jamais au début), ou un "_" (pas au début car signification particulière en objet, ni à la fin).



//------------------------------------
echo '<h2> Concaténation </h2>';
//------------------------------------
// En PHP on concatène avec le symbole "." qui peut se traduire par "suivi de".

$x = 'Bonjour ';
$y = 'tout le monde';

echo $x . $y . '<br>';  // affiche "Bonjour tout les monde <br>"

// Remarque sur echo :
echo $x , $y , '<br>';  // on peut séparer les arguments à afficher dans echo par une ",". Attention, ne marche pas avec print.


//-------------------------------------------------------
echo '<h2> Concaténation lors de l\'affectation </h2>';
//-------------------------------------------------------

$prenom1 = 'Bruno ';
$prenom1 .= 'Claire';  // l'opérateur .= permet d'ajouter la valeur "Claire" à la valeur "Bruno " contenue dans $prenom1 sans l'écraser. Affiche donc "Bruno Claire"
echo $prenom1 . '<br>';



//-------------------------------------------------------
echo '<h2> Guillemets et quotes </h2>';
//-------------------------------------------------------
$message = "aujourd'hui";
$message = 'aujourd\'hui';  // on échappe les apostrophes dans les quotes simples (AltGr + 8)

//---
$txt = 'Bonjour';
echo "$txt tout le monde <br>";  // dans des guillemets, la variable est évaluée : c'est son contenu qui est affiché
echo '$txt tout le monde <br>';  // dans des quotes simples, le nom de la variable est traité comme du texte brut



//-------------------------------------------------------
echo '<h2> Constante </h2>';
//-------------------------------------------------------
// Une constante permet de conserver une valeur sauf que celle-ci ne pourra pas être modifiée durant l'exécution du ou des scripts. Utile par exemple pour conserver les paramètres de connexion à la BDD afin de ne pas pouvoir les altérer.

define('CAPITALE', 'Paris');  // déclare la constante appelée CAPITALE et lui affecte la valeur "Paris". Par convention, les constantes s'écrivent en majuscules.

echo CAPITALE . '<br>';  // affiche Paris



//-------------------------------------------------------
echo '<h2> Opérateurs arithmétiques </h2>';
//-------------------------------------------------------

$a = 10;
$b = 2;

echo $a + $b . '<br>';  // affiche 12
echo $a - $b . '<br>';  // affiche 8
echo $a * $b . '<br>';  // affiche 20
echo $a / $b . '<br>';  // affiche 5
echo $a % $b . '<br>';  // affiche 0   (modulo = reste de la division entière : 10 billes réparties sur 2 personnes, il m'en reste 0)

//------
// Opération et affectation combinées :
$a = 10;
$b = 2;

$a += $b;    // équivaut $a = $a + $b, $a vaut donc au final 12
$a -= $b;    // équivaut $a = $a - $b, $a vaut donc au final 10

// Il existe aussi les opérateurs *=, /= et %=

//-------
// Incrémenter et décrémenter :
$i = 0;
$i++;   // incrémentation : on ajoute +1 à $i
$i--;   // décrémentation : on retranche 1 à $i




//-------------------------------------------------------
echo '<h2> Structures conditionnelles </h2>';
//-------------------------------------------------------

// if...else

$a = 10;
$b = 5;
$c = 2;


if ($a > $b) {  // si $a est supérieur à $b, la condition est évaluée à true, on entre donc dans les accolades qui suivent :
	echo '$a est supérieur à $b <br>';
} else {
	// sinon, dans le cas contraire, on entre dans le else :
	echo '$a est inférieur à $b <br>';
}

//----
// L'opérateur AND qui s'écrit && :
if ($a > $b && $b > $c) {  // si $a est supérieur à $b ET dans le même temps $b est supérieur à $c, alors on entre dans les accolades :
	print 'OK pour les 2 conditions <br>';
}


//----
// L'opérateur OR qui s'écrit ||
$a = 10;
$b = 5;
$c = 2;

if ($a == 9 || $b > $c ) {  // si $a est égal (==) à 9 OU $b est supérieur à $c, alors on entre dans les accolades qui suivent :
	echo 'OK pour au moins une des deux conditions <br>';
} else {
	echo 'Les deux conditions sont fausses <br>';
}

//----
// if ... elseif ... else :
if ($a == 8) {
	echo 'réponse 1 : $a est égal à 8 <br>';
} elseif ($a != 10) {  // notez la syntaxe elseif en un seul mot
	echo 'réponse 2 : $a est différent de 10 <br>';
} else {
	echo 'réponse 3 : les 2 conditions précédentes sont fausses <br>';
}

// Remarque : on ne met pas de ";" à la fin des structures conditionnelles.


//----
// L'opérateur OU exclusif qui s'écrit XOR :
$question1 = 'mineur';
$question2 = 'je vote';  // exemple d'un questionnaire avec plusieurs réponses possibles

if ($question1 == 'mineur' XOR $question2 == 'je vote') {  // avec le OU exclusif seulement l'une des 2 conditions doit être valide (soit l'une OU soit l'autre)
	echo 'Vos réponses sont cohérentes <br>';
} else {
	echo 'Vos réponses ne sont pas cohérentes <br>';  // si les 2 conditions sont vraies (cas de "mineur vote"), ou si les 2 conditions sont fausses (cas de "majeur ne vote pas"), nous entrons dans le else
}


//----
// Condition ternaire :
// Syntaxe contractée de la condition if...else :
$a = 10;

echo ($a == 10) ? '$a est égal à 10 <br>' : '$a est différent de 10 <br>';  // dans la ternaire, le "?" remplace if, et le ":" remplace else. On affiche le premier string si la condition est vraie, sinon le second.

// ou encore :
$resultat = ($a == 10) ? '$a est égal à 10 <br>' : '$a est différent de 10 <br>';
echo $resultat;


//----
// Différence entre == et === :
$varA = 1;  // integer
$varB = '1';  // string

if ($varA == $varB) {  // on compare uniquement en valeur avec l'opérateur ==
	echo '$varA est égal à $varB en valeur <br>';
}

if ($varA === $varB) {  // on compare à la fois en valeur ET en type avec l'opérateur ===
	echo '$varA est égal à $varB en valeur et en type <br>';
} else {
	echo '$varA est différent de $varB en valeur OU en type <br>';
}

// Pour mémoire, le simple "=" correspond à une affectation.


//--------------------
// isset() et empty() :
// Définitions :
// empty() : teste si c'est vide (c'est-à-dire 0, '', NULL, false ou non défini)
// isset() : test si c'est défini (si ça existe) ET a une valeur non NULL

$var1 = 0;
$var2 = '';

if (empty($var1)) {  // la condition est vraie car $var1 contient 0
	echo 'on a 0, vide, NULL, false ou non défini <br>';
}

if (isset($var2)) {  // la condition est vraie car $var2 existe bien
	echo '$var2 est définie <br>';
}

// Si on met les lignes 253 et 254 en commentaires, la première condition reste vraie, car $var1 est non définie, et la seconde devient fausse, car $var2 n'existe pas.

// Contexte d'utilisation : les formulaires pour empty, l'existence de variable ou d'array avec isset avant de les utiliser. 


//-----
// L'opérateur NOT qui s'écrit "!" :
$var3 = 'Je ne suis pas vide';

if (!empty($var3)) echo '$var3 n\'est pas vide <br>';  // ! pour NOT qui est une négation. Ici signifie si $var3 n'est pas vide

// phpinfo();    // fonction prédéfinie qui affiche des infos sur le contexte d'exécution du script


//-------------------------------------------------------
echo '<h2> Condition switch </h2>';
//-------------------------------------------------------
// La condition switch est une autre syntaxe pour écrire un if...elseif...elseif...else.

$couleur = 'jaune';

switch ($couleur) {
	case 'bleu' :  // si $couleur contient la valeur 'bleu', nous exécutons l'instruction après le ":" qui suit :
		echo 'Vous aimez le bleu';
	break;  // break est obligatoire pour quitter la condition switch une fois le case exécuté

	case 'rouge' :
		echo 'Vous aimez le rouge';
	break;

	case 'vert' :
		echo 'Vous aimez le vert';
	break;

	default : // correspond à else, le cas par défaut dans lequel on entre si aucune des valeurs précédentes n'est juste
		echo 'Vous n\'aimez ni le bleu, ni le rouge, ni le vert <br>';
	break;
}


// Exercice : réécrivez le switch précédent en conditions if... pour obtenir exactement le même résultat.
$couleur= 'jaune';

if ($couleur == 'bleu') {
	echo 'Vous aimez le bleu';
} elseif ($couleur == 'rouge') {
	echo 'Vous aimez le rouge';
} elseif ($couleur == 'vert') {
	echo 'Vous aimez le vert';
} else {
	echo 'Vous n\'aimez ni le bleu, ni le rouge, ni le vert <br>';
}



//-----------------------------------------------
echo '<h2> Les fonctions prédéfinies </h2>';
//-----------------------------------------------
// Une fonction prédéfinie permet de réaliser un traitement spécifique prédéterminé dans le langage PHP. 

//----
// strpos() :
$email1 = 'prenom@site.fr';
echo strpos($email1, '@'); // indique la position 6 du caractère '@' dans la chaîne $email1 (compte à partir de 0)

echo '<br>';

$email2 = 'bonjour';
echo strpos($email2, '@');  // cette ligne n'affiche rien, pourtant la fonction strpos retourne bien quelque chose. Pour l'analyser nous faisons un var_dump ci-dessous :
var_dump(strpos($email2, '@'));  // on voit grâce au var_dump que la fonction retourne false quand elle ne trouve pas l'@. var_dump est une instruction d'affichage améliorée que l'on utilise uniquement en phase de dévloppement (on les retire en production).

echo '<br>';

//-----
// strlen() :
$phrase = 'mettez une phrase ici';
echo strlen($phrase) . '<br>';  // affiche la longueur de la chaîne de caractères, ici 21. Notez que strlen compte le nombre d'octets, et que les caractères accentués comptent pour 2. Si vous voulez compter précisément le nombre de caractères, on utilise : mb_strlen().


//-----
// strtolower(), strtoupper(), trim() :
$message = '    Hello World !    ';
echo strtolower($message) . '<br>';   // affiche tout en minuscules
echo strtoupper($message) . '<br>';   // affiche tout en majuscules

echo strlen($message) . '<br>';     // affiche la longueur avec les espaces
echo strlen(trim($message)) . '<br>';   // trim() supprime les espaces au début et à la fin de la chaîne de caractères. Puis strlen affiche la longueur de cette chaîne sans les espaces.


//-----
// die() ou exit() :
// exit('ici un message');  // affiche un message (optionnel) et arrête le script
// die('un autre message'); // die() est un alias de exit : il fait la même chose.


//-----
// Le manuel PHP :
/* Pour chercher une fonction (ou autre chose) de PHP : faire Google "PHP nom de la fonction".

   Exemple : "PHP trim"

   Le site de référence : php.net/manual/fr/

   A retenir : l'encadré blanc qui définit la fonction : en bleu les mots clés et les paramètres, en vert leur type, entre crochets les paramètres optionnels.

*/



//-----------------------------------------------
echo '<h2> Les fonctions utilisateur </h2>';
//-----------------------------------------------
// Des fonctions sont des morceaux de codes encapsulés dans des accolades et portant un nom, qu'on appelle au besoin pour exécuter une action précise.

// Les fonctions qui ne sont pas prédéfinies mais déclarées par le développeur sont appelées fonctions utilisateur.

// Fonction sans paramètre :
function tiret() {   // on déclare une fonction avec le mot clé function, suivi du nom puis d'une paire de (), et enfin d'une paire d'accolades
	echo '<hr>';
}

tiret();  // pour exécuter une fonction, on l'appelle par son nom suivi d'une paire de ()


//-----
// fonction avec paramètre et return :

function afficherBonjour($nom) {
	return 'Bonjour ' . $nom . ', comment vas-tu ?';  // alternative :
	// return "Bonjour $nom, comment vas-tu ?";
	echo 'TEST';  // après un return, les instructions de la fonction ne sont pas lues
}

echo afficherBonjour('Luc'); // si la fonction possède un paramètre, il faut obligatoirement lui envoyer une valeur lors de l'appel de la fonction. La fonction nous retourne le string "Bonjour Luc, comment vas-tu ?" grâce au mot clé return qui s'y trouve. Il faut donc faire ici un echo pour afficher le résultat.

echo '<br>';


// Exercice : écrivez une fonction appelée appliqueTva2 qui multiplie un nombre donnée par un taux donné.
function appliqueTva($nombre) {
	return $nombre * 1.2;
}

// Votre code :
function appliqueTva2($nombre, $taux = 1.5) {  // on peut initialiser un paramètre par défaut si on ne reçoit pas de valeur : ici $taux prend la valeur 1.5 par défaut si on ne lui en donne pas.
	return $nombre * $taux;
}

echo appliqueTva2(15, 1.2) . '<br>'; // affiche 18
echo appliqueTva2(10) . '<br>';  // $taux ayant une valeur par défaut dans les () de la fonction ci-dessus, on n'est pas obligé de lui donner un argument pour ce $taux. Affiche 15


//----------
// Exercice : 
/* - Ecrivez la fonction factureEssence() qui calcule le coût total de votre facture en fonction du nombre de litres d'essence que vous lui donnez en appelant la fonction. Cette fonction retourne la phrase "Votre facture est de X euros pour Y litres d'essence" où X et Y sont variables.

   - Pour cela vous avez besoin du prix au litre. On vous donne une fonction prixLitre() qui vous communique ce prix. Utilisez-la donc dans votre fonction factureEssence(). 
*/

function prixLitre() {
	return rand(100, 200)/100;   // calcule un prix aléatoire entre 1 et 2 (€)
}

// Votre code :
function factureEssence($litreEssence) {
	$prix = prixLitre() * $litreEssence;
	return 'Votre facture est de ' . $prix . ' € pour ' . $litreEssence . ' litres d\'essence.';
}

echo factureEssence(50);


//-----------------------------------------------
echo '<h2> Espace local et espace global </h2>';
//-----------------------------------------------

// De l'espace local à l'espace global :
function jourSemaine() {
	$jour = 'mardi';  // variable locale
	return $jour;     // return permet de sortir une valeur de la fonction
}

// echo $jour;  // ne fonctionne pas car cette variable est locale à la fonction, donc connue et accessible uniquement au sein de cette fonction

echo jourSemaine() . '<br>';  // on récupère la valeur retournée par le return de la fonction : affiche "mardi"


// De l'espace global à l'espace local :
$pays = 'France';   // variable globale

function affichePays() {
	global $pays;  // le mot clé global permet de récupérer une variable globale dans l'espace local de la fonction
	echo $pays;  // on accède donc bien à cette variable
}

affichePays();   // pas de echo car il est déjà dans la fonction



//----------------------------------------------------------
echo '<h2> Les structures itératives : les boucles </h2>';
//----------------------------------------------------------
// Les boucles sont destinées à répéter des lignes de codes de façon automatique.


// Boucle while :
$i = 0;   // valeur de départ de la boucle
while ($i < 3) {   // tant que $i est inférieur à 3, on entre dans la boucle
	// ici le code à répéter
	echo "$i---";   // affiche "0---1---2---"
	$i++;    // on n'oublie pas d'incrémenter pour que la condition d'entrée dans la boucle deviennent fausse à un moment donné (sinon on obtient une boucle infinie)
}

// Note : pas de ";" à la fin du while (= structure)

echo '<br>';


// Exercice : à l'aide d'une boucle while, afficher dans un sélecteur les années depuis 1918 à 2018.
echo '<select>'; 
	echo '<option>1</option>';
	echo '<option>...</option>';
echo '</select>'; 

$i = 1918;
echo '<select>'; 
	while ($i <= 2018) {
		echo "<option>$i</option>";
		$i++;
	}
echo '</select>'; 


//---------------
// Boucle do...while :
// La boucle do while a la particularité de s'exécuter au moins une fois, puis tant que la condition de fin est vraie.

$j = 0;

do {
	echo 'Je fais un tour de boucle';
	$j++;
} while ($j > 10);   // la condition est évaluée à false tout de suite (1 n'étant pas supérieur à 10), et pourtant la boucle a tourné une fois. Attention au ";" après le while !

//--------------
// Boucle for :
// LA boucle for est une autre syntaxe de la boucle while dans laquelle les paramètres valeur de départ, condition d'entrée dans la boucle et incrémentation sont regroupés dans les () du for.

for ($i = 0; $i < 10; $i++) {  // tant que $i est inférieur à 10, on entre dans la boucle, puis on incrémente $i à la fin de la boucle avant de revenir dans la condition
	echo $i . '<br>';  // on fait 10 tours pour les valeurs de $i allant de 0 à 9
}


// Exercice : afficher 12 <option> avec les valeurs de 1 à 12 à l'aide d'une boucle for.

echo '<select>';
	for ($i = 1; $i <= 12; $i++) {
		//echo "<option>$i</option>";  // autre façon de l'écrire :
		echo '<option>' . $i . '</option>';
	}
echo '</select>';

//-----------
// Boucle foreach :
// Il existe aussi la boucle foreach que nous aborderons au chapitre des arrays. Elle sert à parcourir les éléments d'un tableau.




//----------------------------------------------------------
echo '<h2> Exercices de mélanges HTML et PHP </h2>';
//----------------------------------------------------------

// Exercice 1 : faites une boucle FOR qui affiche 0 à 9 sur la même ligne. Résultat attendu : "0123456789".
for ($i = 0; $i < 10; $i++) {
	echo $i;
}

// Exercice 2 : faites une boucle FOR qui affiche 0 à 9 sur la même ligne dans une table HTML.
echo '<table border="1">';
	echo '<tr>';
		for ($i = 0; $i <= 9; $i++) {
			echo '<td>' . $i . '</td>';
		}
	echo '</tr>';
echo '</table>';

echo '<hr>';
// Exercice 3 : faire une table HTML de 10 lignes et 10 colonnes, avec une valeur quelconque à l'intérieur dans un premier temps. Puis dans un second temps, numéroter les cellules de 0 à 99.

$numero = 0;   // pour la 1ere cellule
echo '<table border="1">';
	for ($n = 0; $n <= 9; $n++) {
		echo '<tr>';
			for ($i = 0; $i <= 9; $i++) {
				echo '<td>' . $numero . '</td>';
				$numero++;
			}
		echo '</tr>';
	}
echo '</table>';





//----------------------------------------------------------
echo '<h2> Les tableaux de données : arrays </h2>';
//----------------------------------------------------------
// Un tableau, ou array en anglais, est déclaré comme une variable améliorée dana laquelle on stocke une multitude de valeurs. Ces valeurs peuvent être de n'importe quel type et possèdent un indice par défaut dont la numérotation commence à 0.


// Bien souvent on récupérera les informations de la BDD sous forme d'array (ou éventuellement d'objet).


// Déclarer un array :
$liste = array('Grégoire', 'Nathalie', 'Emilie', 'François', 'Georges');  // on déclare un array avec le mot clé "array"

// echo $liste;   // erreur ('array to string conversion') car on ne peut pas afficher directement un array en PHP

// Pour afficher rapidement le contenu de ce tableau :
echo '<pre>';
	var_dump($liste);  // affiche le contenu du tableau avec certaines infos en plus comme le type des éléments
echo '</pre>';  // balise HTML qui permet de formater l'affichage du var_dump


echo '<pre>';
	print_r($liste);  
echo '</pre>';


// fonction utilisateur pour afficher un print_r :
function debug($param) {
	echo '<pre>';
		print_r($param);  
	echo '</pre>';
}
debug($liste);  // pour vérifier que notre fonction marche


//-----
// Autre moyen d'affecter des valeurs dans un tableau :
$tab = ['France', 'Italie', 'Espagne', 'Portugal']; // on peut utiliser la notation entre crochets pour déclarer un array

$tab[] = 'Suisse';  // les crochets vides permettent d'ajouter une valeur à la fin de notre array $tab

debug($tab);

// afficher la valeur "Italie" de l'array $tab :
echo $tab[1] . '<br>';   // pour accéder à une valeur d'un array, on met son indice entre [] après le nom de cet array


//--------
// Tableau associatif : 
// Dans un tableau associatif nous pouvons choisir le nom des indices :
$couleur = array(
			  'j' => 'jaune',
			  'b' => 'bleu',
			  'v' => 'vert'		
		   );  

// Pour accéder à un élément du tableau associatif : 
echo 'La seconde couleur de notre tableau est le ' . $couleur['b'] . '<br>';
echo "La seconde couleur de notre tableau est le $couleur[b]  <br> ";  // affiche aussi "bleu". Un array écrit dans des guillemets ou des quotes perd les quotes autour de son indice


// Compter le nombre d'éléments contenus dans un array :
echo 'Taille du tableau : ' . count($couleur) . '<br>';   // affiche 3 (éléments)
echo 'Taille du tableau : ' . sizeof($couleur) . '<br>';  // sizeof() est pareil que count() dont il est un alias



//----------------------------------------------------------
echo '<h2> La boucle foreach pour les arrays </h2>';
//----------------------------------------------------------
// foreach est un moyen simple de passer en revue un tableau. Elle fonctionne uniquement sur les tableaux et les objets.

foreach($tab as $valeur) {  // le mot clé "as" fait partie de la structure du foreach et est obligatoire. La variable $valeur (que l'on nomme comme on veut) vient parcourir les valeurs du tableau $tab. Quand il y a qu'une seule variable après "as", elle parcourt systématiquement les VALEURS
	echo $valeur . '<br>';  // on affiche successivement à chaque tour de boucle les éléments du tableau
}

// Parcourir la colonne des indices ET la colonne des valeurs :
foreach($tab as $indice => $valeur) {  // quand il y a 2 variables après "as", la première parcourt toujours les INDICES, et la seconde parcourt toujours les VALEURS
	echo $indice . ' correspond à ' . $valeur . '. <br>';
}


// Exercice : 
/* - écrivez un array avec les indices prenom, nom, email et telephone et mettez y pour valeur des informations fictives. Remarque : cet array ne concerne qu'une seule personne.

   - Puis avec une boucle foreach, affichez les valeurs de votre array dans des <p>, sauf le prenom qui doit être affiché dans un <h3>.
*/
$info = array(
		'prenom' => 'John',
		'nom'    => 'Doe',
		'email'  => 'jdoe@mail.fr',
		'phone'  => '0123456789'
	);

foreach ($info as $indice => $detail) {
	if ($indice == 'prenom') {
		echo "<h3>$indice : $detail</h3>";
	} else {
		echo "<p>$indice : $detail</p>";
	}
}   


//----------------------------------------------------------
echo '<h2> Les arrays multidimensionnels </h2>';
//----------------------------------------------------------
// Nous parlons de tableau multidimensionnel quand un tableau est contenu dans un autre tableau. Chaque tableau représente une dimension.


// Création d'un tableau multidimensionnel :
$tab_multi = array(
				0 => array(
						'prenom' => 'Julien',
						'nom'    => 'Dupon',
						'tel'    => '0123456789'
					 ),
				1 => array(
						'prenom' => 'Nicolas',
						'nom'    => 'Duran',
						'tel'    => '0123456789'
					 ),
				2 => array(
						'prenom' => 'Pierre',
						'nom'    => 'Dulac'
					 )
			 );
// Il est bien-sûr possible de choisir le nom des indices de notre array.

debug($tab_multi);

// Afficher la valeur "Julien" :
echo $tab_multi[0]['prenom'] . '<hr>';  // affiche Julien. Nous entrons d'abord dans $tab_multi, puis nous allons à son indice [0], puis à l'intérieur nous allons à l'indice ['prenom'].


//--------
// Parcourir le tableau multidimensionnel avec une boucle for :
for ($i = 0; $i < count($tab_multi); $i++) {   // count($tab_multi) vaut 3 car il y a bien 3 éléments dans le premier niveau de ce tableau
	echo $tab_multi[$i]['prenom'] . '<br>';  // $i prend successivement les valeurs 0 puis 1 puis 2. On affiche donc à chaque tour de boucle "Julien" puis "Nicolas" puis "Pierre"
}

echo '<hr>';

// Exercice :
// Afficher les 3 prénoms avec une boucle foreach.
foreach ($tab_multi as $indice => $valeur) {
	echo $tab_multi[$indice]['prenom'];  
}
echo '<hr>';
// ou encore :
foreach ($tab_multi as $indice => $valeur) {
	// debug($valeur);
	echo $valeur['prenom'];
}

echo '<hr>';
// Pour afficher tous les éléments d'un array multidimensionnel, on fait des boucles foreach imbriquées (une par dimension) :
foreach ($tab_multi as $indice => $valeur) {
	foreach ($valeur as $label => $info) {  // $valeur étant lui même un array, je refais une foreach dessus pour le parcourir
		echo $label . ' => ' . $info . '<br>';  // $label correspond aux indice de $valeur et $info aux valeurs
	}
}



//----------------------------------------------------------
echo '<h2> Les inclusions de fichiers </h2>';
//----------------------------------------------------------
// on fait un fichier exemple.inc.php

echo 'Première inclusion :';
include 'exemple.inc.php';    // le fichier est "inclus" : en cas d'erreur lors de l'inclusion, include génère une erreur de rype "warning" et continue l'exécution du script.

echo 'Deuxième inclusion :';
include_once 'exemple.inc.php';  // le once vérifie si le fichier a déjà été inclus. Si c'est le cas, il ne le ré-inclut pas.

echo '<br>Troisième inclusion :';
require 'exemple.inc.php';   // le fichier est "requis" : en cas d'erreur sur le nom ou le chemin du fichier, require génère une erreur de type "fatal error" et arrête l'exécution du script.

echo 'Quatrième inclusion : ';
require_once 'exemple.inc.php';  // le once vérifie si le fichier a déjà été inclus. Si c'est le cas, il ne le ré-inclut pas.


//----------------------------------------------------------
echo '<h2> Introduction aux objets </h2>';
//----------------------------------------------------------

// Un objet est autre type de données. Il permet de regrouper des informations : on peut y déclarer des variables appelées PROPRIETES ou ATTRIBUTS, et des fonctions appelées METHODES.

// Pour créer des objets, nous avons besoin d'un "plan de construction" : c'est le rôle de la classe (note : rien à voir avec le CSS...). Nous créons donc une classe pour créer nos meubles :

class Meuble {   // on met une majuscule au nom de la classe
	public $marque = 'ikea';   // on déclare une propriété "marque" (public pour dire qu'elle accessible partout)

	public function origine() {
		return 'Origine Suédoise';
	}
}  // une class est "plan" d'objets qui contient des propriétés et des méthodes. Ainsi en créant un objet à partir de cette classe, cet objet "héritera" de ces propriétés et méthodes.


// Enfin, on crée un objet "table" :
$table = new Meuble();  // new est un mot clé qui permet d'instancier la classe Meuble et d'en faire un objet. On dit que $table est une "instance" de Meuble.

debug($table);  // nous pouvons oberserver le type de $table (object), le nom de la classe dont il provient (Meuble), et sa seule propriété (marque)

echo 'La marque de notre table est : ' . $table->marque . '<br>';  // pour accéder à la propriété d'un objet, on écrit l'objet suivi d'une flèche "->" suivie du nom de la propriété. Affiche "ikea"

echo $table->origine();    // idem pour appeler une méthode d'un objet à laquelle on ajoute une paire de ().

//---------------------------------------------------------------------------------







