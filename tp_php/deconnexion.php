<?php
/*
Auteur : Abderrahim EL Yaagoubi
Objectif : destruction de la session et déconnexion
Date : 2026-10-18
*/
session_start();
session_unset();
session_destroy();
header("Location: login.php");
exit;
