<?php
    include "controller.php";
?>

<!-- Formulaire d'ajout -->

<form action="addOeuvreConfirm" method="post" enctype="multipart/form-data">
    
    <div>
        <label for="titre">Titre : </label>
        <input type="text" name="titre" id="titre" required>
    </div>
    
    <br>

    <div>
        <label for="desc">Description : </label>
        <textarea id="desc" name="desc"></textarea>
    </div>
    
    <br>

    <div>
        <label for="id_format">Format : </label>
        <select id="id_format" name="id_format" required>
            <?php
                $uri = $_SERVER['REQUEST_URI'];
                $url = explode("=", $uri);
                $d = $url[count($url)-1];

                listeFormats($MaBase, $d);
            ?>
        </select>
    </div>
    
    <br>

    <div>
        <?php
            echo "Image représentant votre oeuvre (png ou jpg) : ";
            UploadImage(getLastIdOeuvre($MaBase)+1); // Upload Image qui sera nommée idmax + 1 = id_oeuvre de l'oeuvre nouvellement ajoutée
        ?>
        <input type="file" id="image" name="image">
    </div>

    <br>

    <div>
        <label for="lien">Lien pour consulter le projet : </label>
        <input type="text" name="lien" id="lien">
    </div>
    
    <br>

    <div>
        <label for="id_personne">Artiste : </label>
            <select id="id_personne" name="id_personne" required>
                <?php
                    listePersonnes($MaBase);
                ?>
            </select>

            <select id="id_role" name="id_role" required>
                <?php
                    listeRoles($MaBase, $d);
                ?>
            </select> 
            
    </div>

    <br>
    <br>

    <div>
        <input type="submit" value="Enregistrer" class="ajout">
    </div>

</form>

<br>

<a href="../index.php/oeuvres"> <- Retour à la liste des oeuvres</a>

      
