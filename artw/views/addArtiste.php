<?php
    include "controller.php";
?>

<!-- Formulaire d'ajout -->
<form action="addArtisteConfirm" method="post" enctype="multipart/form-data">

<h1>Ajouter un.e artiste</h1>
    <h2>Artiste</h2>
        <div>
            <label for="prenom" class="label">Prénom *  </label>
            <input type="text" name="prenom" id="prenom" required> <br><br>
            <label for="nom" class="label">Nom *</label>
            <input type="text" name="nom" id="nom" required><br>
        </div>

        <br>

        <div>
            <span class ="label">Photo (.png ou .jpg) </span><br>
            <?php
                UploadImage(getLastIdPersonne($MaBase)+1,'a'); 
                // Upload l'image, qui sera nommée a + (last id +1) + extension (ex : a5.jpg)
            ?>
            <input type="file" id="image" name="image">
        </div>

        <br>
        
    <h2>Réseaux</h2>

        <div>
            <label for="facebook" class="label">Facebook </label>
            <input type="text" name="facebook" id="facebook">
        </div>
        
        <br>

        <div>
            <label for="instagram" class="label">Instagram </label>
            <input type="text" name="instagram" id="instagram">
        </div>
        
        <br>

        <div>
            <label for="twitter" class="label">Twitter </label>
            <input type="text" name="twitter" id="twitter">
        </div>

        <br>

        <div>
            <label for="linkedin" class="label">Linkedin </label>
            <input type="text" name="linkedin" id="linkedin">
        </div>
        
        <br>

        <div>
            <label for="bandcamp" class="label">Bandcamp </label>
            <input type="text" name="bandcamp" id="bandcamp">
        </div>
        <br>
        
    
    <h2>Valider</h2>
        <div>
            <input type="submit" value="Ajouter l'artiste" class="ajout">
        </div>

</form>

<br>
<br>
<br>

<a href="../index.php/artistes">Annuler et retourner à la liste des artistes</a>
    