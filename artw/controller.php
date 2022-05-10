<?php
    require "model.php";

    function listeDomaines() {
        for ($k=1; $k<=8; $k++) {
            echo "<option value=$k>";
            echo getdom()[$k-1]['nom_domaine'];
            echo"</option>";
        }
        echo '</optgroup>';
    }

    /// $n = le domaine
    function listeFormats($n){
        echo '<option value="">--Choisir un format--</option>' ;

        if ($n==1) {
            echo '<optgroup label="Vidéo">';
            for ($k=1; $k<=6; $k++) {
                echo "<option value=$k>";
                echo getformat()[$k-1]['nom_format'];
                echo"</option>";
            }
            echo '</optgroup>';
        }
       
        if ($n==2) {
            echo '<optgroup label="Audio">';
            for ($k=7; $k<=11; $k++) {
                echo "<option value=$k>";
                echo getformat()[$k-1]['nom_format'];
                echo"</option>";
            }
            echo '</optgroup>';
        }
            
        if ($n==3) {
            echo '<optgroup label="Image">';
            for ($k=12; $k<=21; $k++) {
                echo "<option value=$k>";
                echo getformat()[$k-1]['nom_format'];
                echo"</option>";
            }
            echo '</optgroup>';
        }
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



    function UploadImage($k) {

        $poids_max = 5120000; // Poids max de l'image en octets (1Ko = 1024 octets) 
        $repertoire = 'uploads/'; // Repertoire d'upload 

        if (isset($_FILES['image'])) { 

            // Vérif type
            if ($_FILES['image']['type'] != 'image/png' && $_FILES['image']['type'] != 'image/jpeg' && $_FILES['image']['type'] != 'image/jpg' && $_FILES['image']['type'] != 'image/gif' && $_FILES['image']['type'] != 'image/bmp' && $_FILES['image']['type'] != 'image/jpg' && $_FILES['image']['type'] != 'image/png' && $_FILES['image']['type'] != 'image/ico') { 
                $erreur = 'L\'image doit être au format .jpeg, .bmp, .jpg, .png, .ico ou .gif'; 
            } 
            // Vérif poids
            else if ($_FILES['image']['size'] > $poids_max) { 
                $erreur = 'L\'image doit peser moins de ' . $poids_max/1024 . 'Ko.'; 
            } 
            // Vérif répertoire uploads
            else if (!file_exists($repertoire)) { 
                $erreur = 'Erreur, le dossier d\'upload n\'existe pas.'; 
            } 

            // S'il y a une erreur on l'affiche 
            if (isset($erreur)) { 
                echo '' . $erreur . '<br><a href="javascript:history.back(1)">Retour</a>'; 
            } 

            // Sinon on upload
            else { 
                // On définit l'extention du image puis on le nomme par $k
                if ($_FILES['image']['type'] == 'image/jpeg') { $extention = '.jpeg'; } 
                if ($_FILES['image']['type'] == 'image/jpeg') { $extention = '.jpg'; } 
                if ($_FILES['image']['type'] == 'image/png') { $extention = '.png'; } 
                if ($_FILES['image']['type'] == 'image/gif') { $extention = '.gif'; } 
                if ($_FILES['image']['type'] == 'image/gif') { $extention = '.bmp'; } 
                if ($_FILES['image']['type'] == 'image/gif') { $extention = '.jpg'; } 
                if ($_FILES['image']['type'] == 'image/gif') { $extention = '.png'; } 
                if ($_FILES['image']['type'] == 'image/gif') { $extention = '.ico'; } 
                $nom_image = $k.$extention; 

                // On upload l'image sur le serveur
                if (move_uploaded_file($_FILES['image']['tmp_name'], $repertoire.$nom_image)) { 
                    $url = 'https://perso-etudiant.u-pem.fr/~wendy.gervais/artw'.$repertoire.''.$nom_image.''; 
                    //echo 'Votre image a été uploadée sur le serveur avec succès !';
                    
                } 

                else { 
                    //echo 'L\'image n\'a pas pu être uploadée sur le serveur.'; 
                } 

            } 

        } 
            
        return $k.$extention;

    }






    function listeRole($n){
        echo '<option value="">--Choisir un rôle--</option>' ;

        if ($n==1) {
            echo '<optgroup label="Vidéo">';
            for ($k=1; $k<=9; $k++) {
                echo "<option value=$k>";
                echo getroles()[$k-1]['rôle'];
                echo"</option>";
            }
            echo '</optgroup>';
        }
       
        if ($n==2) {
            echo '<optgroup label="Audio">';
            for ($k=7; $k<=11; $k++) {
                echo "<option value=$k>";
                echo getroles()[$k-1]['rôle'];
                echo"</option>";
            }
            echo '</optgroup>';
        }
            
        if ($n==3) {
            echo '<optgroup label="Image">';
            for ($k=12; $k<=21; $k++) {
                echo "<option value=$k>";
                echo getroles()[$k-1]['rôle'];
                echo"</option>";
            }
            echo '</optgroup>';
        }
    }

