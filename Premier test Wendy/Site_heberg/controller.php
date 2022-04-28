<?php
    require "model.php";

    function delete($k) {
        echo '<a href="/~wendy.gervais/delete.php/'.$k.'"'.'class="sup">Supprimer</a>';
        // echo '<a href="/delete.php/'.$k.'"'.'class="sup">Supprimer</a>';
    }


    function listeFormats(){
        echo '<optgroup label="Vidéo">';
        for ($k=1; $k<=6; $k++) {
            echo "<option value=$k>";
            echo getformat()[$k-1]['nom_format'];
            echo"</option>";
        }
        echo '</optgroup>';

        echo '<optgroup label="Audio">';
        for ($k=7; $k<=11; $k++) {
            echo "<option value=$k>";
            echo getformat()[$k-1]['nom_format'];
            echo"</option>";
        }
        echo '</optgroup>';
        

        echo '<optgroup label="Image">';
        for ($k=12; $k<=21; $k++) {
            echo "<option value=$k>";
            echo getformat()[$k-1]['nom_format'];
            echo"</option>";
        }
        echo '</optgroup>';
    }




?>