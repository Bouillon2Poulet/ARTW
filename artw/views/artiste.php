<?php 
    include "controller.php";

    foreach(getPersonnes($MaBase) as $o) {
        if ($o['id_personne'] == $dest) {
            echo " <img class='photoArtiste' alt='Photo artiste' src='https://perso-etudiant.u-pem.fr/~wendy.gervais/artw/uploads/". $o['photo']."'>";
            echo "<br>";

            echo $o['prenom'] .' '.$o['nom'];
            echo "<br>";
            echo "<br>";
            echo "Rôle(s) : ";
            echo "<br>";
            echo "<ul>";
            foreach(getPersonnesAndRoles($MaBase) as $p)
            {
                if ($p['id_personne']== $dest)
                {
                    echo "<li>";
                    echo $p["role"];
                    echo " dans ";
                    echo '<a href ="../../index.php/oeuvre/'.$p['id_oeuvre'].'">'.$p['titre'].'</a>';
                    echo "</li>";
                }
            }
            echo "</ul>";

            echo "<br>";
            echo "<br>";




            echo "<br>";
            echo "<br>";


        }
    }
?>

<br>
<br>

<a href="../../index.php/artistes"> <- Retour à la liste des artistes</a>

