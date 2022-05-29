<?php 
    include "controller.php";

    foreach(getPersonnes($MaBase) as $o) {

        if ($o['id_personne'] == $dest) {

            echo '<div class="blocPersonne">';

                echo "<br>";
                echo "<h2>";
                echo $o['prenom'] .' '.$o['nom'];
                echo "</h2>";
                echo '<img class="photoArtiste" alt=" ' .$o['prenom'] . '" src="'.$uploads. $o['photo'].'">';
                echo "<br>";
                echo "<br>";
                echo "<h2>";
                echo "Rôle(s)";
                echo "</h2>";

                echo "<ul>";
                foreach(getPersonnesAndRoles($MaBase) as $p) {
                    if ($p['id_personne']== $dest) {
                        echo "<li>";
                        echo $p["role"];
                        echo " dans ";
                        echo '<a href ="../../index.php/oeuvre/'.$p['id_oeuvre'].'">'.$p['titre'].'</a>';
                        echo "</li>";
                    }
                }
                echo "</ul>";
                echo "<br><br>";

            echo "</div>";

            echo '<div class="blocReseaux">';
                echo "<h2>Réseaux</h2>";
                echo '<img class= "logo"  src="../../images/fb.png"> Facebook : '. $o['facebook']. "<br>";
                echo '<img class= "logo"  src="../../images/ig.png"> Instagram : '. $o['instagram']. "<br>";
                echo '<img class= "logo"  src="../../images/tw.png"> Twitter : '. $o['twitter']. "<br>";
                echo '<img class= "logo"  src="../../images/in.png"> Linkedin : '. $o['linkedin']. "<br>";
                echo '<img class= "logo"  src="../../images/bc.png"> Bandcamp :'. $o['bandcamp']. "<br>";

                echo "<br>";
                echo "<h2>Actions</h2>";
                
                // echo '<a href="f"'.$o['id_personne'].'"'.'>Éditer</a>';;
                echo '<a href="../editArtiste/'.$o['id_personne'].'"'.'class="">✎Éditer</a>';
                echo '<a href="../deleteArtiste/'.$o['id_personne'].'"'.'class="sup">✖ Supprimer</a>';

                
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
            
            
                echo '<a href="../../index.php/artistes"> Retour à la liste des artistes</a>';



             

            echo "</div>";






        }
    }
?>

<br>
<br>
