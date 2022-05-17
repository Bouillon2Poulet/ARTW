<?php 
    include "controller.php";

    foreach(getPersonnes($MaBase) as $o) {
        if ($o['id_personne'] == $dest) {
            echo " <img class='photoArtiste' alt='Photo artiste' src='https://perso-etudiant.u-pem.fr/~wendy.gervais/artw/uploads/". $o['image']."'>";
            echo "<br>";

            echo $o['prenom'] .' '.$o['nom'];
            echo "<br>";
            echo "Rôle(s) : ";
            echo "<ul>";
            foreach(getPersonnesAndRoles($MaBase) as $p)
            {
                if ($p['id_personne']== $dest)
                {
                    echo "<li>";
                    echo $p["rôle"];
                    echo " dans ";
                    echo '<a href ="../../index.php/oeuvre/'.$p['id_oeuvre'].'">'.$p['titre'].'</a>';
                    echo "</li>";
                }
            }
            echo "</ul>";

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

<a href="../../index.php/artistes"> <- Retour à la liste des artistes</a>

