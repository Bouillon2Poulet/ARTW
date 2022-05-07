<?php
    require "model.php";

    function listeFormats(){
        echo '<option value="">--Choisir un format--</option>' ;
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

    function addOeuvre($MaBase){

        $method=strtolower($_SERVER['REQUEST_METHOD']);

        if ($method == 'post') {

            $titre = $_POST['titre'];
            $format = $_POST['id_format'];
            $desc = $_POST['desc'];
            $lien = $_POST['lien'];

            $gtitre = "'" . $titre . "'";
            $gdesc = "'" . $desc . "'";
            $gformat = "'" . $format . "'";
            $glien = "'" . $lien . "'";
            $gimg = "'" . UploadImage(getlastid() + 1) . "'";

            $req = "INSERT INTO Oeuvres(id_oeuvre, titre, description, image, url, id_format) VALUES (NULL," . $gtitre . "," . $gdesc . "," . $gimg . "," . $glien . "," . $gformat . ")";
            $MaBase->exec($req);

        } else {
            http_response_code(404);
        }
    }

    function deleteOeuvre($MaBase){
        
        // Récupération id_oeuvre à supprimer dans l'URL
        $uri = $_SERVER['REQUEST_URI'];
        $url = explode("/", $uri);
        $dest = $url[count($url)-1];

        // Suppression de l'oeuvre
        $reqdel = 'DELETE FROM Oeuvres WHERE id_oeuvre='."'".$dest."'";
        $MaBase->exec($reqdel);


    }