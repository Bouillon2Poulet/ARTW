<?php
    include "controller.php";
?>

<!-- Formulaire d'ajout -->
<form action="addOeuvreConfirm" method="post" enctype="multipart/form-data">

<h1>Ajouter une oeuvre</h1>
    <h2>Oeuvre</h2>

        <div>
            <label for="titre" class="label">Titre * </label><br>
            <input type="text" name="titre" id="titre" required>
        </div>
        
        <br>

        <div>
            <label for="desc" class="label">Description </label> <br>
            <textarea id="desc" name="desc"></textarea>
        </div>
        
        <br>

        <div>
            <label for="id_format" class="label">Format *</label> <br>
            <select id="id_format" name="id_format" required>
                <?php 
                    $uri = $_SERVER['REQUEST_URI'];
                    $url = explode("=", $uri);
                    $d = $url[count($url)-1]; // id du domaine récupéré dans l'URL avec GET depuis choixDomaine 
                    listeFormats($MaBase, $d);
                ?>
            </select>
        </div>
        
        <br>

        <div>
            <span class ="label">Image d'illustration (.png ou .jpg) </span><br>
            <?php
                UploadImage(getLastIdOeuvre($MaBase)+1,'o'); 
                // Upload l'image, qui sera nommée o + (last id +1) + extension (ex : o5.png)
            ?>
            <input type="file" id="image" name="image">
        </div>

        <br>

        <div>
            <label for="lien" class="label">Lien du projet </label> <br>
            <input type="text" name="lien" id="lien">
        </div>
        
        <br>

    <h2>Artiste(s) ayant participé</h2>

        
        <?php // div f0 permettant d'ajouter le premier artiste
            echo '<div id="f0">
                <label for="id_personne0" class="label">Artiste 1 * : </label>
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
            // Insère un noeud newNode à la suite de existingNode
            function insertAfter(newNode, existingNode) {
                existingNode.parentNode.insertBefore(newNode, existingNode.nextSibling);
            }

            // Au clic sur le bouton de fn, le supprime et crée la div fn+1 permettant d'ajouter l'artiste n+1 à la suite de la div fn
            function addligne(n) {
                m = n+1;
                const fnp1 = document.createElement("div");
                fnp1.id = "f" + m;
                fnid = "f" + n;
                insertAfter(fnp1, document.getElementById(fnid));

                p = "id_personne"+m;
                r = "id_role"+m;

                a1 = '<label for="'+p+'" class="label">Artiste ' + (m+1) + '  </label>';
                a2 =  '<select id="'+p+'" name="'+p+'" >' +'<?php listePersonnes($MaBase) ?>'+ '</select>';
                a3 =  '<select id="'+r+'" name="'+r+'" >' +'<?php listeRoles($MaBase, $d); ?>'+ '</select>';

                b = '<button id="b'+m + '" onclick="addligne('+ m + ')">' + '+ </button>';
                document.getElementById(fnp1.id).innerHTML = a1+a2+a3+b;
                let bn = document.getElementById('b'+n);
                bn.remove();
            }
        </script>

        <br>
        L'artiste n'existe pas encore sur ARTW ? <a href= "addArtiste">Ajoutez le/la ! </a>

        <br>
        <br>

    <h2>Valider</h2>
        <div>
            <input type="submit" value="Ajouter l'oeuvre" class="ajout">
        </div>

</form>

<br>
<br>
<br>

<a href="../index.php/oeuvres"> Annuler et retourner à la liste des oeuvres</a>

      
