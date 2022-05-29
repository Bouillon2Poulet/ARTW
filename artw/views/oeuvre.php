<?php 
    include "controller.php";

    foreach(getOeuvres($MaBase) as $o) {
        if ($o['id_oeuvre'] == $dest) {

            echo '<div class="blocOeuvre">';

                echo "<h2><i> ".$o['titre']." </i></h2>";
                    echo " Domaine : ". $o['nom_domaine'];
                    echo "<br>";
                    echo "Format : " . $o['nom_format'];
                    echo "<br>";
                    echo "<br>";

                    if ($o['description'] != '') {
                        echo  '"'.$o['description'].'"';
                        echo "<br>";
                        echo "<br>";
                    }

                    if ($o['url'] !='') {
                        echo "<a target='_blank' href='". $o['url'] . "'>";
                        echo " Consulter le projet en cliquant ici ! </a> ";
                        echo "<br>";
                    }
                    
                    echo "<br>";
                    echo '<img class="imgOeuv" alt=" ' .$o['titre'] . '" src="'.$uploads. $o['image'].'">';
                    echo "<br>";

            echo "</div>";

            echo "<br>";
            echo "<br>";

            echo '<div class="blocArtistes">';
                echo "<h2>Artiste(s) ayant participé</h2>";

                    foreach(getPersonnesdeOeuvreN($dest, $MaBase) as $p) {
                        echo '<img class ="photoListeOeuvre" src="'.$uploads.$p['photo'].'">';
                        echo ' ';
                        echo '<a href="../artiste/';
                        echo $p['id_personne'];
                        echo '">'; 
                        echo $p['prenom'].' '. $p['nom'] .'</a>';
                        echo "<br>";

                        foreach(getRolesdePersonneDdansOeuvreN($p['id_personne'], $dest, $MaBase) as $r) {
                            echo " - ";
                            echo $r['role'];
                            echo "<br>";
                        }
                        echo "<br>";
                        
                        echo "</ul>";
                        
                    }

                
            echo "<br>";

            echo "<h2>Actions</h2>";
                echo '<a href="../editOeuvre/'.$o['id_oeuvre'].'"'.'>✎Éditer</a>';;
                echo "<br>";
                echo '<a href="../deleteOeuvre/'.$o['id_oeuvre'].'"'.'class="sup">✖ Supprimer</a>';


            echo "<br><br><br><br>";
            echo '<a href="../../index.php/oeuvres"> Retour à la liste des oeuvres</a>';
            echo "</div>";

        }
    }
?>

<br>
<br>


