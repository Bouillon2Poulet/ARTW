
<?php 
    include "controller.php";

    foreach(getOeuvres($MaBase) as $o) {

        if ($o['id_oeuvre'] == $dest) {

            echo "Oeuvre <br>";
            echo "<br>";

            echo "Titre : ".  $o['titre'];

            echo "<br>";

            echo " Domaine : ". $o['nom_domaine'];

            echo "<br>";

            echo "Format : " . $o['nom_format'];

            echo "<br>";
            echo "<br>";

            echo "Description : ". $o['description'];

            echo "<br>";
            echo "<br>";

            echo "<a target='_blank' href='". $o['url'] . "'>";
            echo " Consulter le projet en cliquant ici ! </a> ";



            echo "<br>";
            echo "<br>";


            echo " <img class='imgOeuv' alt='Image oeuvre' src='https://perso-etudiant.u-pem.fr/~wendy.gervais/artw/uploads/". $o['image']."'>";

            echo "<br>";
            echo "<br>";

            echo "Artistes ayant participé <br>";
            echo "<br>";





        }
    }
?>

<br>
<br>

<a href="../../index.php/oeuvres"> <- Retour à la liste des oeuvres</a>

