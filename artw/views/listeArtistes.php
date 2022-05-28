<?php 
    include "controller.php";
?>


<!-- Bouton pour add un artiste -->
<a href="../index.php/addArtiste" class="ajout">Ajouter un artiste</a>


<br><br><br>

<?php

    // Début du tableau HTML des artistes

    echo '<table>
    <tr>
    <th>Nom</th>
    <th>Nombre d\'oeuvres</th>
    </tr>';

    foreach(getPersonnes($MaBase) as $p) {
        echo '<tr>';
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



