<?php
/*
Auteur : Abderrahim EL Yaagoubi
Objectif : tableaux, statistiques et tri
Date : 2026-10-18
*/
require("config.php");

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

function afficher($tab) {
    foreach ($tab as $nom => $valeur) {
        echo "<p> $nom : $valeur </p>";
    }
}

// Expérience 1 : avec include, un fichier inexistant génère un simple avertissement et le script continue.
// Avec require, c'est une erreur fatale et le script s'arrête.
// Expérience 2 : avec include deux fois, le contenu du fichier s'affiche deux fois.
// Avec include_once, il ne s'affiche qu'une seule fois car le fichier n'est inclus qu'une fois.

require("includes/entete_inc.php");
require("includes/menu_inc.php");

echo "<h1>Exercice 3.1 : Création</h1>";
$notes = [
    "Mohamed" => 16, "Ahmed" => 14, "Hind" => 13, "Aicha" => 15,
    "Samir" => 13, "Zakaria" => 13, "Rafik" => 10, "Ilham" => 9,
    "Hamza" => 7, "Sami" => 7, "Noura" => 14
];
$modules = ["Mathématiques", "Informatique", "Français"];

echo "<h2> Modules </h2>";
foreach ($modules as $index => $module) {
    echo "<p> $index : $module </p>";
}
echo "<p> " . $modules[0] . " </p>";
echo "<p> " . $modules[1] . " </p>";
echo "<p> " . $modules[2] . " </p>";

echo "<h2> Notes </h2>";
foreach ($notes as $nom => $note) {
    echo "<p> $nom : $note </p>";
}


echo "<h1>Exercice 3.2 : Affichage HTML</h1>";

echo "<table>";
echo "<tr><th>Nom</th><th>Note</th><th>Mention</th></tr>";
foreach ($notes as $nom => $note) {
    if ($note < SEUIL) {
        echo "<tr style=\"color: red;\"><td>" . htmlspecialchars($nom) . "</td><td>$note</td><td>" . mention($note) . "</td></tr>";
    } else {
        echo "<tr><td>" . htmlspecialchars($nom) . "</td><td>$note</td><td>" . mention($note) . "</td></tr>";
    }
}
echo "</table>";


echo "<h1>Exercice 3.3 : Statistiques</h1>";
$somme = 0;
$min = null;
$max = null;
foreach ($notes as $note) {
    $somme += $note;
    if ($min === null || $note < $min) {
        $min = $note;
    }
    if ($max === null || $note > $max) {
        $max = $note;
    }
}
$moyenne = $somme / count($notes);

echo "<p> Somme : $somme </p>";
echo "<p> Moyenne : $moyenne </p>";
echo "<p> Meilleure note : $max </p>";
echo "<p> Plus faible note : $min </p>";

// vérification avec les fonctions PHP
echo "<p> Vérification avec array_sum : " . array_sum($notes) . "</p>";
echo "<p> Vérification avec count : " . count($notes) . "</p>";
echo "<p> Vérification avec max : " . max($notes) . "</p>";
echo "<p> Vérification avec min : " . min($notes) . "</p>";

$effectifs = [
    "Très bien" => 0,
    "Bien" => 0,
    "Assez bien" => 0,
    "Passable" => 0,
    "Ajourné" => 0
];
foreach ($notes as $note) {
    $effectifs[mention($note)]++;
}
echo "<h2> Effectifs </h2>";
foreach ($effectifs as $libelle => $effectif) {
    echo "<p> $libelle : $effectif </p>";
}


echo "<h1>Exercice 3.4 : Tri</h1>";

echo "<h2> Tri par noms croissants (ksort) </h2>";
$notes_noms = $notes;
ksort($notes_noms);
afficher($notes_noms);

echo "<h2> Tri par notes décroissantes (arsort) </h2>";
$notes_notes = $notes;
arsort($notes_notes);
afficher($notes_notes);

echo "<h2> Tri par noms décroissants (krsort) </h2>";
$notes_noms_desc = $notes;
krsort($notes_noms_desc);
afficher($notes_noms_desc);

echo "<h2> Tri par notes croissantes (asort) </h2>";
$notes_asc = $notes;
asort($notes_asc);
afficher($notes_asc);

// sur un tableau indexé comme $modules, on utilise sort() pour l'ordre croissant et rsort() pour l'ordre décroissant.


echo "<h1>Exercice 3.5 : Opérateurs de tableaux</h1>";
$a = ["x" => 1, "y" => 2];
$b = ["y" => 2, "x" => 1];

// $a + $b donne ["x" => 1, "y" => 2] car l'opérateur + conserve les clés de $a et n'ajoute que les clés de $b absentes de $a.
// $a == $b est true car les deux tableaux contiennent les mêmes clés avec les mêmes valeurs, l'ordre n'est pas comparé.
// $a === $b est false car l'ordre des clés est différent.

var_dump($a + $b);
var_dump($a == $b);
var_dump($a === $b);

require("includes/pied_inc.php");
?>
