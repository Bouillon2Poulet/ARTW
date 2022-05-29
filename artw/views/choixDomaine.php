<?php
    include "controller.php";
?>

<h1>Ajouter une oeuvre</h1>

<!-- Formulaire d'ajout -->
<form action="addOeuvre" method="get" enctype="multipart/form-data">
    
        <label for="domaine">De quel domaine artistique relève votre oeuvre ?</label> <br><br>
        <select id="domaine" name="domaine" required>
            <?php
                listeDomaines($MaBase);
            ?>
        </select>
        
        <input type="submit" value="Confirmer" class="bouton">


</form>

<br>
<a href="../index.php/oeuvres">Annuler et retourner à la liste des oeuvres</a>