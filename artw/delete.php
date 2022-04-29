<?php
    require "views/header.php";
    include "controller.php";
?>


<html>
    <head>
    <title>Suppression...</title>

    <!-- Redirection delete->app pendant 1sec -->
    <meta http-equiv="refresh" content="0.5; URL=/~wendy.gervais/artw/index.php/oeuvres">


        <?php
        // Récupération id_oeuvre à supprimer dans l'URL
        $uri = $_SERVER['REQUEST_URI'];
        $url = explode("/", $uri);
        $dest = $url[count($url)-1];

        // Suppression de l'oeuvre
        $reqdel = 'DELETE FROM Oeuvres WHERE id_oeuvre='."'".$dest."'";
        $MaBase->exec($reqdel);

        // Remise à zéro auto-increment (quand on crée une nvelle oeuvre ça repartira pas de l'id effacé)
        $reqAI = 'ALTER TABLE Oeuvres AUTO_INCREMENT=0';
        $MaBase->exec($reqAI);


        // Bouton retour (si pas de redirection)
        echo '<a href="/~wendy.gervais/artw/index.php/oeuvres">Retour</a>';


        ?>

    </head>


</html>