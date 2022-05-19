<?php
    include "model.php";
    

    // Uploade l'image nommée 'k' sur le serveur, et renvoie 'k.png'/'k.jpg'
    function UploadImage($k) {

        $poids_max = 50000000; // Poids max de l'image en octets (1Ko = 1024 octets) 
        $repertoire = 'uploads/'; // Repertoire d'upload 
        $extention = '';

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
    
    // Liste déroulante des domaines
    function listeDomaines($MaBase) {
        for ($k=1; $k<=8; $k++) {
            echo "<option value=$k>";
            echo getDomaines($MaBase)[$k-1]['nom_domaine'];
            echo"</option>";
        }
        echo '</optgroup>';
    }

    // Liste déroulante des formats du domaine n
    function listeFormats($MaBase,$n){
        echo '<option value="">--Choisir un format--</option>' ;

        if ($n==1) {
            echo '<optgroup label="Vidéo">';
            for ($k=1; $k<=6; $k++) {
                echo "<option value=$k>";
                echo getFormats($MaBase)[$k-1]['nom_format'];
                echo"</option>";
            }
            echo '</optgroup>';
        }
       
        if ($n==2) {
            echo '<optgroup label="Audio">';
            for ($k=7; $k<=11; $k++) {
                echo "<option value=$k>";
                echo getFormats($MaBase)[$k-1]['nom_format'];
                echo"</option>";
            }
            echo '</optgroup>';
        }
            
        if ($n==3) {
            echo '<optgroup label="Image">';
            for ($k=12; $k<=21; $k++) { 
                echo "<option value=$k>";
                echo getFormats($MaBase)[$k-1]['nom_format'];
                echo"</option>";
            }
            echo '</optgroup>';
        }

        if ($n==4) {
            echo '<optgroup label="Texte">';
            for ($k=22; $k<=25; $k++) {
                echo "<option value=$k>";
                echo getFormats($MaBase)[$k-1]['nom_format'];
                echo"</option>";
            }
            echo '</optgroup>';
        }

        if ($n==5) {
            echo '<optgroup label="Volume">';
            for ($k=26; $k<=30; $k++) {
                echo "<option value=$k>";
                echo getFormats($MaBase)[$k-1]['nom_format'];
                echo"</option>";
            }
            echo '</optgroup>';
        }

        if ($n==6) {
            echo '<optgroup label="Performance">';
            for ($k=31; $k<=34; $k++) {
                echo "<option value=$k>";
                echo getFormats($MaBase)[$k-1]['nom_format'];
                echo"</option>";
            }
            echo '</optgroup>';
        }

        if ($n==7) {
            echo '<optgroup label="Interactif">';
            for ($k=35; $k<=37; $k++) {
                echo "<option value=$k>";
                echo getFormats($MaBase)[$k-1]['nom_format'];
                echo"</option>";
            }
            echo '</optgroup>';
        }

        if ($n==8) {
            echo '<optgroup label="Autre">';
            for ($k=38; $k<=38; $k++) {
                echo "<option value=$k>";
                echo getFormats($MaBase)[$k-1]['nom_format'];
                echo"</option>";
            }
            echo '</optgroup>';
        }
    }

    // Liste déroulante des roles du domaine n
    function listeRoles($MaBase, $n){
        echo '<option value="">--Choisir un role--</option>' ;

        if ($n==1) {
            echo '<optgroup label="Vidéo">';
            for ($k=1; $k<=9; $k++) {
                echo "<option value=$k>";
                echo getRoles($MaBase)[$k-1]['role'];
                echo"</option>";
            }
            echo '</optgroup>';
        }
       
        if ($n==2) {
            echo '<optgroup label="Audio">';
            for ($k=10; $k<=14; $k++) {
                echo "<option value=$k>";
                echo getRoles($MaBase)[$k-1]['role'];
                echo"</option>";
            }
            echo '</optgroup>';
        }
            
        if ($n==3) {
            echo '<optgroup label="Image">';
            for ($k=15; $k<=18; $k++) {
                echo "<option value=$k>";
                echo getRoles($MaBase)[$k-1]['role'];
                echo"</option>";
            }
            echo '</optgroup>';
        }

        if ($n==4) {
            echo '<optgroup label="Texte">';
            for ($k=19; $k<=19; $k++) {
                echo "<option value=$k>";
                echo getRoles($MaBase)[$k-1]['role'];
                echo"</option>";
            }
            echo '</optgroup>';
        }

        if ($n==5) {
            echo '<optgroup label="Volume">';
            for ($k=20; $k<=20; $k++) {
                echo "<option value=$k>";
                echo getRoles($MaBase)[$k-1]['role'];
                echo"</option>";
            }
            echo '</optgroup>';
        }

        if ($n==6) {
            echo '<optgroup label="Perfomance">';
            for ($k=21; $k<=23; $k++) {
                echo "<option value=$k>";
                echo getRoles($MaBase)[$k-1]['role'];
                echo"</option>";
            }
            echo '</optgroup>';
        }

        if ($n==7) {
            echo '<optgroup label="Interactif">';
            for ($k=24; $k<=26; $k++) {
                echo "<option value=$k>";
                echo getRoles($MaBase)[$k-1]['role'];
                echo"</option>";
            }
            echo '</optgroup>';
        }

        if ($n==8) {
            echo '<optgroup label="Autre">';
            for ($k=27; $k<=27; $k++) {
                echo "<option value=$k>";
                echo getRoles($MaBase)[$k-1]['role'];
                echo"</option>";
            }
            echo '</optgroup>';
        }
    }

    // Liste déroulante des personnes
    function listePersonnes($MaBase){
        echo '<option value="">--Choisir un artiste--</option>' ;

        for ($k=1; $k<=getLastIdPersonne($MaBase); $k++) {
            echo "<option value=$k>";
            echo getPersonnes($MaBase)[$k-1]['prenom'];
            echo ' ';
            echo getPersonnes($MaBase)[$k-1]['nom'];
            echo"</option>";

        }
        
    }

    // Ajoute oeuvre depuis formulaire
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
            
            $gimg = "'" . UploadImage(getLastIdOeuvre($MaBase) + 1) . "'";

            $req = "INSERT INTO oeuvres(id_oeuvre, titre, description, image, url, id_format) VALUES (NULL," . $gtitre . "," . $gdesc . "," . $gimg . "," . $glien . "," . $gformat . ")";
            $MaBase->exec($req);

            $idp = $_POST['id_personne'];
            $idr = $_POST['id_role'];
            $idoeuvre = getLastIdOeuvre($MaBase)+1;

            $gidp= "'" . $idp . "'";
            $gidr = "'" . $idr . "'";
            $gido = "'" . $idoeuvre . "'";

            $reqrole = "INSERT INTO remplir_role(id_personne, id_role, id_oeuvre) VALUES (" . $gidp . "," . $gidr . "," . $gido .")";
            $MaBase->exec($reqrole);



        } else {
            http_response_code(404);
        }
    }
        
    // Delete l'oeuvre (numéro /get)
    function deleteOeuvre($MaBase){
        
        // Récupération id_oeuvre à supprimer dans l'URL
        $uri = $_SERVER['REQUEST_URI'];
        $url = explode("/", $uri);
        $dest = $url[count($url)-1];

        // Suppression de l'oeuvre
        $reqdel = 'DELETE FROM oeuvres WHERE id_oeuvre='."'".$dest."'";
        $MaBase->exec($reqdel);

        // Suppression des roles liés à l'oeuvre
        $reqdelrole = 'DELETE FROM remplir_role WHERE id_oeuvre='."'".$dest."'";
        $MaBase->exec($reqdelrole);


    }
