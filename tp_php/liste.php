<?php
/*
Auteur : Abderrahim EL Yaagoubi
Objectif : lecture du fichier CSV avec fgetcsv() et fgets()
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

$fichier = "data/notes.csv";
if (!file_exists($fichier)) {
    echo "<p> Le fichier data/notes.csv n'existe pas.</p>";
    exit;
}

$handle = fopen($fichier, "r");
if ($handle === false) {
    echo "<p> Impossible d'ouvrir le fichier.</p>";
    exit;
}

$lignes = [];
while (($ligne = fgetcsv($handle, 1000, ";")) !== false) {
    $lignes[] = $ligne;
}
fclose($handle);

// la première ligne du fichier est l'en-tête
echo "<h1>Exercice 5.2 : Liste des apprenants</h1>";
echo "<table>";
echo "<tr><th>Nom</th><th>Info</th><th>Math</th><th>Moyenne</th><th>Mention</th></tr>";
$somme_generale = 0;
$nombre = 0;
foreach ($lignes as $index => $ligne) {
    if ($index == 0) {
        continue;
    }
    $nom = $ligne[0];
    $info = (float) $ligne[1];
    $math = (float) $ligne[2];
    $moyenne = ($info + $math) / 2;
    $somme_generale += $moyenne;
    $nombre++;
    echo "<tr><td>" . htmlspecialchars($nom) . "</td><td>$info</td><td>$math</td><td>$moyenne</td><td>" . mention($moyenne) . "</td></tr>";
}
echo "</table>";
$moyenne_generale = $nombre > 0 ? $somme_generale / $nombre : 0;
echo "<p> Moyenne générale de la classe : $moyenne_generale </p>";


echo "<h1>Exercice 5.3 : Lecture bas niveau</h1>";
$handle = fopen($fichier, "r");
while (!feof($handle)) {
    $ligne = fgets($handle);
    if ($ligne === false) {
        break;
    }
    $parts = explode(";", trim($ligne));
    echo "<p>" . implode(" | ", $parts) . "</p>";
}
fclose($handle);

// avec fgetcsv(), le séparateur, les guillemets et les champs contenant le séparateur sont gérés automatiquement, mais chaque ligne doit respecter la structure du CSV.
// avec fgets() et explode(), on a un contrôle total sur chaque ligne, mais un champ contenant ";" ou des guillemets casse le découpage.
?>
