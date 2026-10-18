<?php
/*
Auteur : Abderrahim EL Yaagoubi
Objectif : page de profil protégée par la session
Date : 2026-10-18
*/
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Profil</title>
</head>
<body>
    <h1> Bienvenue <?php echo htmlspecialchars($_SESSION['login']); ?></h1>
    <p><a href="deconnexion.php">Se déconnecter</a></p>
</body>
</html>
