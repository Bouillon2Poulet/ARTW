<?php 
    include "controller.php";
?>


<h1>Oeuvres</h1>

<?php
    // Début du tableau HTML des oeuvres
    
    echo '<table>
    <tr>
    <th></th>
    <th></th>
    <th></th>
    </tr>';

    foreach(getOeuvres($MaBase) as $o) { // 1 oeuvre = 1 ligne tr
        echo '<tr>';

            echo '<td>';
                echo '<img class ="imageListe" src="'.$uploads.$o['image'].'">';
            echo '</td>';

            echo '<td>';
                echo '<a href="oeuvre/';
                echo $o['id_oeuvre'];
                echo '">';
                echo " <i> " .$o['titre']." </i> ";
                echo "</a>";

            echo '</td>';
                echo '<td>';
                echo $o['nom_domaine'];
                echo ' (';
                echo $o['nom_format'];
                echo ')';
            echo '</td>';

        echo '</tr>';
    }
 
    echo '</table>';
    
    // Fin tableau HTML

    ?>

<!-- Bouton pour add une oeuvre -->
<br><br>
<a href="../index.php/choixDomaine" class="ajout">Ajouter une oeuvre</a>



