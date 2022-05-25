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



    <?php

        echo '<div id="f0">
            <label for="id_personne">Artiste 1 : </label>
                <select id="id_personne" name="id_personne" required>';
                listePersonnes($MaBase);
        echo  "</select>";

        echo '<select id="id_role" name="id_role" required>';
                listeRoles($MaBase, $d);
        echo "</select>";
        
        echo '<button onclick="addligne(0)">+ </button>' ;
        
        echo "</div>";
        
    ?>

    <script>
        function insertAfter(newNode, existingNode) {
            existingNode.parentNode.insertBefore(newNode, existingNode.nextSibling);
        }

        // quand je clique
        function nouvelleligne() {

            const f1 = document.createElement("div");
            f1.id = "f1";
            insertAfter(f1, document.getElementById("f0"));

            a1 = '<label for="id_personne">Artiste : </label>';
            a2 =  '<select id="id_personne" name="id_personne" >' +'<?php listePersonnes($MaBase) ?>'+ '</select>';
            a3 =  '<select id="id_role" name="id_role" >' +'<?php listeRoles($MaBase, $d); ?>'+ '</select>';

            b = '<button onclick="nouvelleligne()">+ </button>';
            document.getElementById("f1").innerHTML = a1+a2+a3+b;
            
        }
        


        // quand je clique
        function addligne(n) {
            m = n+1;

            const fnp1 = document.createElement("div");
            fnp1.id = "f" + m;
            fnid = "f" + n;

            insertAfter(fnp1, document.getElementById(fnid));

            a1 = '<label for="id_personne">Artiste ' + (m+1) + ' : </label>';
            a2 =  '<select id="id_personne" name="id_personne" >' +'<?php listePersonnes($MaBase) ?>'+ '</select>';
            a3 =  '<select id="id_role" name="id_role" >' +'<?php listeRoles($MaBase, $d); ?>'+ '</select>';
       

            b = '<button onclick="addligne('+ m + ')">' + '+ </button>';

            document.getElementById(fnp1.id).innerHTML = a1+a2+a3+b;
            
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

      
