<?php
/*
Auteur : Abderrahim EL Yaagoubi
Objectif : connexion, session et cookie
Date : 2026-10-18
*/
session_start();
require("config.php");

if (isset($_POST['login'])) {
    $login = trim($_POST['login']);
    if (!empty($login)) {
        $_SESSION['login'] = $login;
        setcookie("dernier_login", $login, time() + 86400, "/");
        setcookie("derniere_connexion", json_encode(["login" => $login, "date" => date("d/m/Y H:i:s")]), time() + 86400, "/");
        header("Location: profil.php");
        exit;
    }
}

$valeur_login = "";
if (isset($_COOKIE['dernier_login'])) {
    $valeur_login = $_COOKIE['dernier_login'];
}

$derniere_connexion = "";
if (isset($_COOKIE['derniere_connexion'])) {
    $donnees = json_decode($_COOKIE['derniere_connexion'], true);
    if (is_array($donnees) && isset($donnees['date'])) {
        $derniere_connexion = $donnees['date'];
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>
    <h1>Connexion</h1>
    <?php if ($derniere_connexion != "") { ?>
        <p> Dernière connexion : <?php echo htmlspecialchars($derniere_connexion); ?></p>
    <?php } ?>
    <form method="POST">
        <label> Login : <input type="text" name="login" value="<?php echo htmlspecialchars($valeur_login); ?>"> </label>
        <input type="submit" value="Se connecter">
    </form>
</body>
</html>
<?php
// une session est stockée côté serveur, le client ne reçoit qu'un identifiant dans un cookie (PHPSESSID). Un cookie est stocké côté client, dans le navigateur.
// setcookie() et header() doivent être appelés avant tout affichage car PHP doit envoyer les en-têtes HTTP avant le contenu de la page.
?>
