<?php
/*
Auteur : Abderrahim EL Yaagoubi
Objectif : pied de page et exercice sur les dates
Date : 2026-10-18
*/
?>
<footer>
    <p>Date du jour : <?php echo date('d/m/Y'); ?></p>
    <?php
    $fin_semestre = new DateTime("2026-12-18");
    $aujourdhui = new DateTime("today");
    $interval = $aujourdhui->diff($fin_semestre);
    echo "<p> Jours restants avant la fin du semestre : " . $interval->days . "</p>";

    $jour = 31;
    $mois = 2;
    $annee = 2026;
    if (checkdate($mois, $jour, $annee)) {
        echo "<p> La date $jour/$mois/$annee est valide </p>";
    } else {
        echo "<p> La date $jour/$mois/$annee est invalide </p>";
    }
    ?>
</footer>
</body>
</html>
