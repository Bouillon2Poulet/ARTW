<?php
    include "controller.php";
?>


<!-- Formulaire d'ajout -->
<form action="addOeuvre" method="get" enctype="multipart/form-data">
<!-- <form action="/add.php" method="post"> -->
    <div>
        <label for="domaine">De quel domaine sera votre oeuvre ?</label>
        <select id="domaine" name="domaine" required>
            <?php
                listeDomaines($MaBase);
            ?>
        </select>
        
    <input type="submit" value="Confirmer" class="bouton">
    </div>


</form>

<br>
<a href="../index.php/oeuvres"> <- Retour à la liste des oeuvres</a>