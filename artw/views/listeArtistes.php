<?php 
    include "controller.php";
?>


<h1>Artistes</h1>

<?php
    // Début du tableau HTML des artistes

    echo '<table> 
    <tr>
    <th></th>
    <th>Nom</th>
    <th>Nombre d\'oeuvres</th>
    </tr>';

    foreach(getPersonnes($MaBase) as $p) { // 1 artiste = 1 ligne tr
        echo '<tr>';

            echo '<td>';
                echo '<img class ="photoListe" src="'.$uploads.$p['photo'].'">';
            echo '</td>';

            echo '<td>';
                echo '<a href="artiste/';
                echo $p['id_personne'];
                echo '">';
                echo $p['prenom'];
                echo ' ';
                echo $p['nom'];
                echo "</a>";
            echo '</td>';

            echo '<td>';
                echo getNbOeuvresDePersonne($p['id_personne'], $MaBase);
            echo '</td>';

        echo '</tr>';
    }
    
    echo '</table>'; 

    // Fin tableau HTML
    
    ?>

<!-- Bouton pour add un artiste -->
<br><br>
<a href="../index.php/addArtiste" class="ajout">Ajouter un.e artiste</a>





