<?php
/*
Auteur : Abderrahim EL Yaagoubi
Objectif : validation du formulaire de saisie et écriture dans le CSV
Date : 2026-10-18
*/
require("config.php");

if (!isset($_POST['nom'], $_POST['note_info'], $_POST['note_math'])) {
    echo "<p> Les champs du formulaire sont absents.</p>";
} elseif (empty($_POST['nom'])) {
    echo "<p> Le nom est obligatoire.</p>";
} elseif (!is_numeric($_POST['note_info']) || !is_numeric($_POST['note_math'])) {
    echo "<p> Les notes doivent être numériques.</p>";
} elseif ($_POST['note_info'] < NOTE_MIN || $_POST['note_info'] > NOTE_MAX || $_POST['note_math'] < NOTE_MIN || $_POST['note_math'] > NOTE_MAX) {
    echo "<p> Les notes doivent être comprises entre NOTE_MIN et NOTE_MAX.</p>";
} else {
    $nom = $_POST['nom'];
    $note_info = $_POST['note_info'];
    $note_math = $_POST['note_math'];

    $fichier = fopen("data/notes.csv", "a");
    fputcsv($fichier, [$nom, $note_info, $note_math], ";");
    fclose($fichier);

    echo "<p> Récapitulatif :</p>";
    echo "<p> Nom : " . htmlspecialchars($nom) . "</p>";
    echo "<p> Note Info : " . htmlspecialchars($note_info) . "</p>";
    echo "<p> Note Math : " . htmlspecialchars($note_math) . "</p>";
}

// on préfère POST à GET pour un mot de passe car GET envoie les données dans l'URL, qui est conservée dans l'historique, les favoris et les logs, tandis que POST les envoie dans le corps de la requête.
// $_REQUEST contient le contenu de $_GET, $_POST et $_COOKIE.
// avec le mode "w", le fichier existant est écrasé à chaque exécution, alors que le mode "a" ajoute une ligne à la fin du fichier.
?>
