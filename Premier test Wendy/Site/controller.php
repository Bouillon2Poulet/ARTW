<?php
    require "model.php";


    // Pour delete le k-ième élément du tableau -> redirige vers /k où DELETE WHERE id_oeuvre=k ...
    function delete($k) {
        echo '<a href="/delete.php/'.$k.'"'.'class="sup">Supprimer</a>';
        
    }

    // Pour afficher liste déroulante dans add.php
    function listeDomaines(){
        for ($k=1; $k<9; $k++) {
            echo "<option value=$k>";
            echo getdom()[$k-1]['nom_domaine'];
            echo"</option>";
        }
    }

    function listeFormats(){
        for ($k=1; $k<9; $k++) {
            echo "<option value=$k>";
            echo getformat()[$k-1]['nom_format'];
            echo"</option>";
        }
    }


?>