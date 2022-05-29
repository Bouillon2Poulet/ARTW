<?php
include "controller.php";

foreach(getPersonnes($MaBase) as $o) {

    if ($o['id_personne'] == $dest) {

        echo '<form action="../editArtisteConfirm/'.$o['id_personne'].'" method="post" enctype="multipart/form-data">';

        echo '<div><label for="nom">Nom : </label><input type="text" name="nom" id="nom" value="';
        echo $o['nom'];
        echo '"required></div><br>';

        echo '<div><label for="prenom">Prénom : </label><input type="text" name="prenom" id="prenom" value="';
        echo $o['prenom'];
        echo '"required></div><br>';

        echo '<div><label for="facebook">Facebook : </label><textarea id="facebook" name="facebook">';
        echo $o['facebook'];
        echo '</textarea></div><br>';

        echo '<div><label for="instagram">Instagram : </label><textarea id="instagram" name="instagram">';
        echo $o['instagram'];
        echo '</textarea></div><br>';

        echo '<div><label for="twitter">Twitter : </label><textarea id="twitter" name="twitter">';
        echo $o['twitter'];
        echo '</textarea></div><br>';

        echo '<div><label for="linkedin">Linkedin : </label><textarea id="linkedin" name="linkedin">';
        echo $o['linkedin'];
        echo '</textarea></div><br>';

        echo '<div><label for="bandcamp">Bandcamp : </label><textarea id="bandcamp" name="bandcamp">';
        echo $o['bandcamp'];
        echo '</textarea></div><br>';


        echo '<span>Photo :</span>';
        echo " <img class='photoArtiste' alt='Photo artiste' src= " .$uploads. $o['photo']. "'>";
        echo '<div>';

        echo "Remplacer l'image : ";

        UploadImage($o['id_personne'], 'a'); 

        echo '<input type="file" id="image" name="image">';


    }
}

?>

<br>

    <div>
        <input type="submit" value="Enregistrer" class="ajout">
    </div>

</form>

<br>
<a href="../../index.php/artistes"> <- Retour à la liste des artistes</a>


