<?php
/*
Auteur : Abderrahim EL Yaagoubi
Objectif : structures de contrôle et boucles
Date : 2026-10-18
*/
include("config.php");

function mention($note) : string {

    if ($note >= 16) {
        return "Très bien";
    } elseif ($note >= 14) {
        return "Bien";
    } elseif ($note >= 12) {
        return "Assez bien";
    } elseif ($note >= SEUIL) {
        return "Passable";
    } else {
        return "Ajourné";
    }
}

echo "<h1>Exercice 2.1 : if / elseif / else</h1>";
echo("<p>La mention pour la note 8 est : " . mention(8) . "</p>");
echo("<p>La mention pour la note 12 est : " . mention(12) . "</p>");
echo("<p>La mention pour la note 14 est : " . mention(14) . "</p>");
echo("<p>La mention pour la note 16 est : " . mention(16) . "</p>");
echo("<p>La mention pour la note 18 est : " . mention(18) . "</p>");


echo "<h1>Exercice 2.2 : switch</h1>";

$mois_courant = date("m");

switch ($mois_courant) {
    case 1:
        echo "<p>Le mois courant est Janvier</p>";
        break;
    case 2:
        echo "<p>Le mois courant est Février</p>";
        break;
    case 3:
        echo "<p>Le mois courant est Mars</p>";
        break;
    case 4:
        echo "<p>Le mois courant est Avril</p>";
        break;
    case 5:
        echo "<p>Le mois courant est Mai</p>";
        break;
    case 6:
        echo "<p>Le mois courant est Juin</p>";
        break;
    case 7:
        echo "<p>Le mois courant est Juillet</p>";
        break;
    case 8:
        echo "<p>Le mois courant est Août</p>";
        break;
    case 9:
        echo "<p>Le mois courant est Septembre</p>";
        break;
    case 10:
        echo "<p>Le mois courant est Octobre</p>";
        break;
    case 11:
        echo "<p>Le mois courant est Novembre</p>";
        break;
    case 12:
        echo "<p>Le mois courant est Décembre</p>";
        break;
    default:
        echo "<p>Mois non reconnu</p>";
}

// si on oublie le break, le code continue à s'exécuter jusqu'au prochain break ou à la fin du switch

echo "<h1>Exercice 2.3 : Boucles</h1>";
echo "<h2>Exercice 2.3.1 : Boucle for</h2>";
for ($i = 1; $i <= 6; $i++){
    for ($j = 1; $j <= $i; $j++){
        echo "*";
    }
    echo "<br>";
}
echo "<h2>Exercice 2.3.2 : Boucle while</h2>";
$i = 0;
while ($i <= 20){
    if ($i == 10){
        echo "<p><b> $i</b></p>";
    } else {
        echo "<p> $i</p>";
    }
    $i += 2;
}

echo "<h2>Exercice 2.3.3 : for/continue</h2>";

for ($i = 0; $i <= 10; $i++){
    if ($i % 2 != 0){
        continue;
    }
    echo "<p> $i</p>";
}

echo "<h2>Exercice 2.3.4 : while, switch et break 2</h2>";
$i = 1;
while ($i <= 10) {

    switch ($i) {
        case 5:
            echo "<p>At 5</p>";
            break;
        case 10:
            echo "<p>At 10; quitting</p>";
            break 2;
        default:
            echo "<p> $i</p>";
    }
    $i++;
}

echo "<h2>Exercice 2.3.5 : do-while</h2>";
$i = 0;
do {
    if ($i == 10){
        echo "<p><b> $i</b></p>";
    } else {
        echo "<p> $i</p>";
    }
    $i += 2;
} while ($i <= 20);
// la différence entre while et do-while est que do-while s'exécute au moins une fois, même si la condition est fausse

?>
