
<?php 
    include "controller.php";


    foreach(getOeuvres($MaBase) as $o) {

        if ($o['id_oeuvre'] == $dest) {

            echo '<div class="blocOeuvre">';
            echo "<h2>Oeuvre</h2> ";

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


            echo '<img class="imgOeuv" alt=" ' .$o['titre'] . '" src="'.$uploads. $o['image'].'">';

            echo "<br>";

            echo "</div>";

            echo '<div class="blocArtistes">';

            echo "<h2>Artiste(s) ayant participé</h2>";

            foreach(getRolesdeOeuvreN($dest, $MaBase) as $p) {
                echo '<a href="../artiste/';
                echo $p['id_personne'];
                echo '">'; 
                echo $p['prenom'].' '. $p['nom'] .'</a>';
                echo' ('.$p['role'].')';
                echo "<br>";
            }
            echo "</div>";


            echo "<br>";
            echo "<br>";

            echo "<h2>Actions</h2>";
            echo '<a href="../editOeuvre/'.$o['id_oeuvre'].'"'.'>Éditer</a>';;
            echo "<br>";
            echo '<a href="../deleteOeuvre/'.$o['id_oeuvre'].'"'.'class="sup">Supprimer</a>';


            echo "<br><br><br><br>";
            echo '<a href="../../index.php/oeuvres"> Retour à la liste des oeuvres</a>';



    
            








        }
    }
?>

<br>
<br>


