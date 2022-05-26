<?php
    include "controller.php";
?>

<!-- Formulaire d'ajout -->

<form action="addOeuvreConfirm" method="post" enctype="multipart/form-data">

<h2> Oeuvre</h2>

    <div>
        <label for="titre" class="label">Titre </label><br>
        <input type="text" name="titre" id="titre" required>
    </div>
    
    <br>

    <div>
        <label for="desc" class="label">Description </label> <br>
        <textarea id="desc" name="desc"></textarea>
    </div>
    
    <br>

    <div>
        <label for="id_format" class="label">Format </label> <br>
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
        <span class ="label">Image d'illustration (png ou jpg) </span><br>
        <?php
            UploadImage(getLastIdOeuvre($MaBase)+1); // Upload Image qui sera nommée idmax + 1 = id_oeuvre de l'oeuvre nouvellement ajoutée
        ?>
        <input type="file" id="image" name="image">
    </div>

    <br>

    <div>
        <label for="lien" class="label">Lien pour consulter le projet </label> <br>
        <input type="text" name="lien" id="lien">
    </div>
    
    <br>

    <h2>Artiste(s) ayant participé</h2>

    <?php

        echo '<div id="f0">
            <label for="id_personne0" class="label">Artiste 1 : </label>
                <select id="id_personne0" name="id_personne0" required>';
                listePersonnes($MaBase);
        echo  "</select>";

        echo '<select id="id_role0" name="id_role0" required>';
                listeRoles($MaBase, $d);
        echo "</select>";
        
        echo '<button id="b0" onclick="addligne(0)">+ </button>' ;
        
        echo "</div>";
        
    ?>


    <script> // Script JS qui permet d'ajouter des champs Artistes avec +
        function insertAfter(newNode, existingNode) {
            existingNode.parentNode.insertBefore(newNode, existingNode.nextSibling);
        }

        function addligne(n) {
            m = n+1;
            const fnp1 = document.createElement("div");
            fnp1.id = "f" + m;
            fnid = "f" + n;
            insertAfter(fnp1, document.getElementById(fnid));

            p = "id_personne"+m;
            r = "id_role"+m;


            // a1 = '<label for="id_personne">Artiste ' + (m+1) + ' : </label>';
            // a2 =  '<select id="id_personne" name="id_personne" >' +'<?php listePersonnes($MaBase) ?>'+ '</select>';
            // a3 =  '<select id="id_role" name="id_role" >' +'<?php listeRoles($MaBase, $d); ?>'+ '</select>';

            a1 = '<label for="'+p+'" class="label">Artiste ' + (m+1) + ' : </label>';
            a2 =  '<select id="'+p+'" name="'+p+'" >' +'<?php listePersonnes($MaBase) ?>'+ '</select>';
            a3 =  '<select id="'+r+'" name="'+r+'" >' +'<?php listeRoles($MaBase, $d); ?>'+ '</select>';



            b = '<button id="b'+m + '" onclick="addligne('+ m + ')">' + '+ </button>';
            document.getElementById(fnp1.id).innerHTML = a1+a2+a3+b;
            let bn = document.getElementById('b'+n);
            bn.remove();

        }
        
    </script>


    <br>
    <br>

    <div>
        <input type="submit" value="Enregistrer" class="ajout">
    </div>

</form>

<br>

<a href="../index.php/oeuvres"> <- Retour à la liste des oeuvres</a>

      
