<?php
include "controller.php";

foreach(getPersonnes($MaBase) as $o) {

    if ($o['id_personne'] == $dest) {

        echo '<form action="../editArtisteConfirm/'.$o['id_personne'].'" method="post" enctype="multipart/form-data">';

        echo '<div><label for="nom" class="label">Nom : </label><input type="text" name="nom" id="nom" value="';
        echo $o['nom'];
        echo '"required></div><br>';

        echo '<div><label for="prenom"  class="label" >Prénom : </label><input type="text" name="prenom" id="prenom" value="';
        echo $o['prenom'];
        echo '"required></div><br>';

        echo '<div><label for="facebook" class="label">Facebook : </label><textarea id="facebook" name="facebook">';
        echo $o['facebook'];
        echo '</textarea></div><br>';

        echo '<div><label for="instagram" class="label">Instagram : </label><textarea id="instagram" name="instagram">';
        echo $o['instagram'];
        echo '</textarea></div><br>';

        echo '<div><label for="twitter" class="label">Twitter : </label><textarea id="twitter" name="twitter">';
        echo $o['twitter'];
        echo '</textarea></div><br>';

        echo '<div><label for="linkedin" class="label">Linkedin : </label><textarea id="linkedin" name="linkedin">';
        echo $o['linkedin'];
        echo '</textarea></div><br>';

        echo '<div><label for="bandcamp" class="label">Bandcamp : </label><textarea id="bandcamp" name="bandcamp">';
        echo $o['bandcamp'];
        echo '</textarea></div><br>';


        echo '<span  class="label" >Photo :</span><br>';
        echo " <img class='photoArtiste' alt='Photo artiste' src= " .$uploads. $o['photo']. '>';
        echo '<br><br><div>';

        echo '<span  class="label" >Remplacer la photo </span><br>';

        UploadImage($o['id_personne'], 'a'); 

        echo '<input type="file" id="image" name="image">';


    }
}

?>

<br><br><br>

    <div>
        <input type="submit" value="Enregistrer" class="ajout">
    </div>

</form>

<br>
<a href="../../index.php/artistes">Annuler et retourner à la liste des artistes</a>


