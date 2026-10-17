<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<?php 
require("config.php");
echo "Hello PHP";
echo "<h1>Exercice 1.1 : Variables</h1>";

// $x, $_x, $2x, $x-y, $Prix_HT, $prix ht, $état

// $x est une variable valide car il contient des charactères  et commence par un signe dollar ($).
// $_x est une variable valide car elle commence par un signe dollar ($) et contient des caractères valides.
// $2x n'est pas une variable valide car elle commence par un chiffre (2)  
// $x-y n'est pas une variable valide car elle contient un tiret (-) qui n'est pas autorisé dans les noms de variables.
// $Prix_HT est une variable valide car elle commence par un signe dollar ($) et contient des caractères valides, y compris un underscore (_).
// $prix ht n'est pas une variable valide car elle contient un espace, ce qui n'est pas autorisé dans les noms de variables.
// $état est une variable valide car elle commence par un signe dollar ($) et contient des caractères valides, y compris un caractère accentué (é).


$x = 10;
$_x = "hi";
$Prix_HT = 12;
$état = "valide";

echo "<p> $x, $_x, $Prix_HT, $état </p>";
// $a et $A sont deux variables différentes car PHP est sensible à la casse
$a = 5;
$A = 10;

echo "<p> $a, $A </p>";


// Exercice 1.2 : Constantes
echo "<h1>Exercice 1.2 : Constantes</h1>";

echo "<p> ETABLISSEMENT : " . ETABLISSEMENT . "</p>"; // si nous affichez un constante qui n'existe pas, PHP génère une erreur.

echo "<p> NOTE_MIN : " . NOTE_MIN . "</p>";
echo "<p> NOTE_MAX : " . NOTE_MAX . "</p>";
echo "<p> SEUIL : " . SEUIL . "</p>";
echo "<p> defined('SEUIL') : " . (defined('SEUIL') ? 'true' : 'false') . "</p>";
echo "<p> defined('INCONNUE') : " . (defined('INCONNUE') ? 'true' : 'false') . "</p>";

/* la difference entre const et define() est que const est utilisé pour 
définir des constantes au moment de la compilation, tandis que define() est 
utilisé pour définir des constantes au moment de l'exécution. De plus, const 
ne peut pas être utilisé dans des conditions ou des boucles, tandis que define
() peut l'être.
*/


// Exercice 1.3 : Calcul
echo "<h1>Exercice 1.3 : Calcul</h1>";
$prix_ht = 60;
$tva = 20;
$prix_ttc = $prix_ht +  ($prix_ht * $tva / 100);
echo "<p> Le prix TTC du produit est de $prix_ttc € </p>";


// Exercice 1.4 : Types et conversions
echo "<h1>Exercice 1.4 : Types et conversions</h1>";
echo "<h2>1-</h2>";
$test = 42;
$test = (string)$test;
echo "<pre> verification avec var_dump() </pre>";
var_dump($test);
// var_dump((bool) ...) : 0, 0.0, "0", "", "abc", [], null.
echo "<h2>2-</h2>";
echo "<p>var_dump((bool) ...) : 0, 0.0, &quot;0&quot;, &quot;&quot;, &quot;abc&quot;, [], null.</p>";
echo "<p>var_dump((bool) 0)</p>";
var_dump((bool) 0);
echo "<p>var_dump((bool) 0.0)</p>";
var_dump((bool) 0.0);
echo "<p>var_dump((bool) &quot;0&quot;)</p>";
var_dump((bool) "0");
echo "<p>var_dump((bool) &quot;&quot;)</p>";
var_dump((bool) "");
echo "<p>var_dump((bool) &quot;abc&quot;)</p>";
var_dump((bool) "abc");
echo "<p>var_dump((bool) &quot;[]&quot;)</p>";
var_dump((bool) []);
echo "<p>var_dump((bool) null)</p>";
var_dump((bool) null);

// (int) 3.9, (int) "12abc", (float) "1.5e3", (int) true.
echo "<h2>3-</h2>";
echo "<p>var_dump((int) 3.9)</p>";
var_dump((int) 3.9);
echo "<p>var_dump((int) &quot;12abc&quot;)</p>";
var_dump((int) "12abc");
echo "<p>var_dump((float) &quot;1.5e3&quot;)</p>";
var_dump((float) "1.5e3");
echo "<p>var_dump((int) true)</p>";
var_dump((int) true);

echo "<h2>4-</h2>";

echo "<p> le nombre 255 :</p>";

$nombre = 255;
echo "<p> en décimal : " . $nombre . "</p>";
echo "<p> en hexadécimal : " . dechex($nombre) . "</p>";
echo "<p> en octal : " . decoct($nombre) . "</p>";
echo "<p> en binaire : " . decbin($nombre) . "</p>";

echo "<h1>Exercice 1.5 : Chaînes de caractères</h1>";
$traitees = "égales à";
$ici = 2;
echo "<p>Ahmed a dit : \"J'ai réussi\" </p>";
echo "<p> Voulez-vous supprimer C:\\*.*? </p>";
echo "<p>Ceci n'affichera pas \\n de nouvelle ligne </p>";
echo '<p>Les variables ne seront pas $traitees $ici </p>';
echo "<p>Les variables seront $traitees $ici </p>";

$chaine = "*Bonjour les développeurs*";
$chaine = trim($chaine, "*");
echo "<p> La chaîne de caractères est : $chaine </p>";
for ($i = 0; $i < strlen($chaine); $i++){
    echo "<p>" . htmlspecialchars($chaine[$i]) . "</p>";
}
?>