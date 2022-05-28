<?php 
    include "controller.php";
?>


<!-- Bouton pour add une oeuvre -->
<a href="../index.php/choixDomaine" class="ajout">Ajouter une oeuvre</a>

<br><br><br>

<?php

    // Début du tableau HTML des oeuvres
    
    echo '<table>
    <tr>
    <th>Titre</th>
    <th>Domaine</th>
    <th>Format</th>
    </tr>';

    foreach(getOeuvres($MaBase) as $o) {
        echo '<tr>';
        echo '<td>';
        echo '<a href="oeuvre/';
        echo $o['id_oeuvre'];
        echo '">';
        echo $o['titre'];
        echo "</a>";
        echo '</td>';

        echo '<td>';
        echo $o['nom_domaine'];
        echo '</td>';

        echo '<td>';
        echo $o['nom_format'];
        echo '</td>';

        echo '<td>';
        echo '<a href="editOeuvre/'.$o['id_oeuvre'].'"'.'>Modifier</a>';;
        echo '</td>';

        echo '<td>';
        echo '</td>';

        echo '<td>';
        echo '<a href="deleteOeuvre/'.$o['id_oeuvre'].'"'.'class="sup">Supprimer</a>';
        echo '</td>';    

        echo '</tr>';
    }
 
    echo '</table>';
    
    // Fin tableau HTML


    ?>



