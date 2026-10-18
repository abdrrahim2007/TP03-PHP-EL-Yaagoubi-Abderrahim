<?php
/*
Auteur : Abderrahim EL Yaagoubi
Objectif : traitement du formulaire en GET
Date : 2026-10-18
*/
require("config.php");

$nom = $_GET['nom'] ?? '';
$prenom = $_GET['prenom'] ?? '';
$sexe = $_GET['sexe'] ?? '';

if ($sexe == "M") {
    echo "<p> Bonjour Monsieur " . htmlspecialchars("$prenom $nom") . "</p>";
} else {
    echo "<p> Bonjour Madame " . htmlspecialchars("$prenom $nom") . "</p>";
}
?>
