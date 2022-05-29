<?php 
    include "controller.php";

    foreach(getPersonnes($MaBase) as $o) { // Toutes les personnes

        if ($o['id_personne'] == $dest) { // Personne en question (artiste/n)

            echo '<div class="blocPersonne">';

                echo "<br>";
                echo "<h2>".$o['prenom'] .' '.$o['nom']."</h2>"; // Nom Prénom
                    echo '<img class="photoArtiste" alt=" ' .$o['prenom'] . '" src="'.$uploads. $o['photo'].'">'; // Photo
                    echo "<br><br>";

                echo "<h2>Rôle(s)</h2>";
                    echo "<ul>";
                    foreach(getPersonnesAndRoles($MaBase) as $p) { // Toutes les personnes et rôles 
                        if ($p['id_personne']== $dest) { // Rôles de la personne en question
                            echo "<li>";
                            echo $p["role"]; // Rôle
                            echo " dans ";
                            echo '<a href ="../../index.php/oeuvre/'.$p['id_oeuvre'].'">'.$p['titre'].'</a>'; // Oeuvre
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
                    echo '<a href="../editArtiste/'.$o['id_personne'].'"'.'class="">✎Éditer</a>';
                    echo "<br>";
                    echo '<a href="../deleteArtiste/'.$o['id_personne'].'"'.'class="sup">✖ Supprimer</a>';

                    
                echo "<br><br><br><br>";

                echo '<a href="../../index.php/artistes"> Retour à la liste des artistes</a>';

            echo "</div>";
        }
    }
?>

<br>
<br>
