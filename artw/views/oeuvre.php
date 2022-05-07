
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

            echo "<br>";
            echo "<br>";

            echo "<a target='_blank' href='". $o['url'] . "'>";
            echo " Consulter le projet en cliquant ici ! </a> ";



            echo "<br>";
            echo "<br>";


            echo " <img class='imgOeuv' alt='Image oeuvre' src='https://perso-etudiant.u-pem.fr/~wendy.gervais/artw/uploads/". $o['image']."'>";




        }
    }
?>

<br>
<br>

<a href="../../index.php/oeuvres"> <- Retour à la liste des oeuvres</a>

