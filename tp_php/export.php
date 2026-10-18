<?php
/*
Auteur : Abderrahim EL Yaagoubi
Objectif : export des résultats au format JSON
Date : 2026-10-18
*/
require("config.php");

$fichier = "data/notes.csv";
$resultats = [];
if (file_exists($fichier)) {
    $handle = fopen($fichier, "r");
    $premiere_ligne = true;
    while (($ligne = fgetcsv($handle, 1000, ";")) !== false) {
        if ($premiere_ligne) {
            $premiere_ligne = false;
            continue;
        }
        $moyenne = ((float) $ligne[1] + (float) $ligne[2]) / 2;
        $resultats[] = [
            "nom" => $ligne[0],
            "note_info" => (float) $ligne[1],
            "note_math" => (float) $ligne[2],
            "moyenne" => $moyenne
        ];
    }
    fclose($handle);
}

$json = json_encode($resultats, JSON_PRETTY_PRINT);
file_put_contents("data/notes.json", $json);

$relu = json_decode(file_get_contents("data/notes.json"), true);

echo "<h1>Exercice 5.4 : Sérialisation</h1>";
echo "<h2> Lecture du fichier JSON avec print_r() </h2>";
echo "<pre>" . print_r($relu, true) . "</pre>";

echo "<h2> serialize() </h2>";
echo "<p>" . htmlspecialchars(serialize($resultats)) . "</p>";

echo "<h2> json_encode() </h2>";
echo "<p>" . htmlspecialchars($json) . "</p>";

// JSON est le format directement exploitable par une application JavaScript car il correspond au format natif des objets JavaScript, contrairement à serialize() qui est propre à PHP.
?>
