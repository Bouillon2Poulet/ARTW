<?php
include "controller.php";

foreach(getOeuvres($MaBase) as $o) {

    if ($o['id_oeuvre'] == $dest) {

        echo '<form action="../editOeuvreConfirm/'.$o['id_oeuvre'].'" method="post" enctype="multipart/form-data">';

        echo '<div><label for="titre">Titre : </label><input type="text" name="titre" id="titre" value="';
        echo $o['titre'];
        echo '"required></div><br>';

        echo '<div><label for="desc">Description : </label><textarea id="desc" name="desc">';
        echo $o['description'];
        echo '</textarea></div><br>';

        $d = getDomaineFromFormat($MaBase, $o['id_format']);
    

        echo '<div><label for="id_format">Format : </label><select id="id_format" name="id_format" required>';
        listeFormats($MaBase, $d);

      

        echo '</select></div><br>';

        echo '<span>Image :</span>';

        echo " <img class='imgOeuv' alt='Image oeuvre' src='".$uploads. $o['image']."'>";
        echo '<div>';

        echo "Remplacer l'image : ";
        UploadImage(getLastIdOeuvre($MaBase)+1, 'o'); // Upload Image qui sera nommée idmax + 1 = id_oeuvre de l'oeuvre nouvellement ajoutée
        echo '<input type="hidden" name="MAX_FILE_SIZE" value="';
        echo '"><input type="file" id="image" name="image"></div><br>';

        echo '<div><label for="lien">Lien pour consulter le projet : </label> <input type="text" name="lien" id="lien" value="';
        echo $o['url'].'"> </div><br>';


    }
}

?>

<br>

    <div>
        <input type="submit" value="Enregistrer" class="ajout">
    </div>

</form>

<br>
<a href="../../index.php/oeuvres"> <- Retour à la liste des oeuvres</a>


