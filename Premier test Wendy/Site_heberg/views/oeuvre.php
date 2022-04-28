
<?php 
    include "controller.php";

    foreach(getOeuvres() as $o) {
        if ($o['id_oeuvre'] == $dest) {
            echo "Titre : ";
            echo $o['titre'];
            echo "<br>";
            echo " Domaine : ";
            echo $o['nom_domaine'];
            echo "<br>";
            echo "Format : ";
            echo $o['nom_format'];
            echo "<br>";
            echo "<br>";


            echo "Description : ";
            echo $o['description'];

        }
    }
?>

<br>
<br>

<a href="/~wendy.gervais/app.php/oeuvres"> <- Retour à la liste des oeuvres</a>
<!-- <a href="/app.php/oeuvres"> <- Retour à la liste des oeuvres</a> -->

