<?php
include "controller.php";

foreach(getOeuvres($MaBase) as $o) {

    if ($o['id_oeuvre'] == $dest) {

        echo '<form action="../editOeuvreConfirm/'.$o['id_oeuvre'].'" method="post" enctype="multipart/form-data">';

        echo '<div><label for="titre" class="label">Titre </label><br><input type="text" name="titre" id="titre" value="';
        echo $o['titre'];
        echo '"required></div><br>';

        echo '<div><label for="desc" class="label">Description </label><br><textarea id="desc" name="desc">';
        echo $o['description'];
        echo '</textarea></div><br>';

        $d = getDomaineFromFormat($MaBase, $o['id_format']);
    

        echo '<div><label for="id_format" class="label">Format </label><br><select id="id_format" name="id_format" required>';
        listeFormats($MaBase, $d);

      

        echo '</select></div><br>';

        echo '<span class="label">Image :</span><br>';

        echo " <img class='imgOeuv' alt='Image oeuvre' src='".$uploads. $o['image']."'>";
        echo '<br><br><div>';

        echo '<span class="label">Remplacer l\'image </span><br>' ;
        UploadImage(getLastIdOeuvre($MaBase)+1, 'o'); // Upload Image qui sera nommée idmax + 1 = id_oeuvre de l'oeuvre nouvellement ajoutée
        echo '<input type="hidden" name="MAX_FILE_SIZE" value="';
        echo '"><input type="file" id="image" name="image"></div><br>';

        echo '<div><label for="lien" class="label">Lien du projet  </label> <br><input type="text" name="lien" id="lien" value="';
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
<a href="../../index.php/oeuvres"> Annuler et retourner à la liste des oeuvres</a>


