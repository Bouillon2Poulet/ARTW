<?php
    include "model.php";
    

    // LISTES DEROULANTES
    // Liste déroulante des domaines
    function listeDomaines($MaBase) {
        echo '<option value="">--Choisir un domaine --</option>';
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
        echo '<option value="">--Choisir un.e artiste--</option>' ;
        foreach (getPersonnes($MaBase) as $p) {
            echo "<option value =".$p['id_personne'].">";
            echo $p['prenom'];
            echo ' ';
            echo $p['nom'];
            echo"</option>";

        }
        
    }





    // OEUVRES
    // ADD : Ajoute oeuvre depuis formulaire (post)
    function addOeuvre($MaBase){
        $method=strtolower($_SERVER['REQUEST_METHOD']);
        if ($method == 'post') {

            // Ajout dans table oeuvres
                $titre = $_POST['titre'];
                $format = $_POST['id_format'];
                $desc = $_POST['desc'];
                $lien = $_POST['lien'];

                
                $gtitre = "'" . $titre . "'";
                $gdesc = "'" . $desc . "'";
                $gformat = "'" . $format . "'";
                $glien = "'" . $lien . "'";
                
                $gimg = "'" . UploadImage(getLastIdOeuvre($MaBase) + 1,'o') . "'";

                $req = "INSERT INTO oeuvres(id_oeuvre, titre, description, image, url, id_format) VALUES (NULL," . $gtitre . "," . $gdesc . "," . $gimg . "," . $glien . "," . $gformat . ")";
                $MaBase->exec($req);
            
            // Ajout dans table remplir_role
                $idoeuvre = getLastIdOeuvre($MaBase);
                $gido = "'" . $idoeuvre . "'";

                $idp = $_POST['id_personne0'];
                $idr = $_POST['id_role0'];

                $gidp= "'" . $idp . "'";
                $gidr = "'" . $idr . "'";

                $reqrole = "INSERT INTO remplir_role(id_personne, id_role, id_oeuvre) VALUES (" . $gidp . "," . $gidr . "," . $gido .")";
                $MaBase->exec($reqrole);

                $k=1;

                for ($k=1; $_POST['id_personne'.$k]!=''; $k++) {
                    $idp = $_POST['id_personne'.$k];
                    $idr = $_POST['id_role'.$k];
                    $gidp= "'" . $idp . "'";
                    $gidr = "'" . $idr . "'";
                    $reqrole = "INSERT INTO remplir_role(id_personne, id_role, id_oeuvre) VALUES (" . $gidp . "," . $gidr . "," . $gido .")";
                    $MaBase->exec($reqrole);
                }

        } else {
            http_response_code(404);
        }
    }
        
    // DELETE : Supprime l'oeuvre (numéro /get)
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

        // Reset du compteur
        $reqinc = 'ALTER TABLE oeuvres AUTO_INCREMENT=0';
        $MaBase->exec($reqinc);


    }

    // UPDATE : Edite l'oeuvre depuis formulaire (post)
    function updateOeuvre($MaBase){
        $method=strtolower($_SERVER['REQUEST_METHOD']);

        if ($method == 'post') {


            $uri = $_SERVER['REQUEST_URI'];
            $url = explode("/", $uri);
            $dest = $url[count($url)-1];

            $titre = $_POST['titre'];
            $format = $_POST['id_format'];
            $desc = $_POST['desc'];
            $lien = $_POST['lien'];

            $gtitre = "'" . $titre . "'";
            $gdesc = "'" . $desc . "'";
            $gformat = "'" . $format . "'";
            $glien = "'" . $lien . "'";
            

            // Remplacement photo
            foreach(getOeuvres($MaBase) as $o) {
                if ($o['id_oeuvre'] == $dest) {

                    // on initialise le champ à la valeur actuelle
                    $img = $o['image'];

                    // si on a effectivement uploadé une nouvelle image, on rechange le champ
                    if (UploadImage($dest, 'o') != 'o.png') {
                        $img = UploadImage($o['id_oeuvre'], 'o');
                    }
                }
            }

            $gimg = "'".$img."'";

            $req = "UPDATE oeuvres SET titre=".$gtitre.", description=".$gdesc.", image=".$gimg.", url=".$glien.", id_format=".$gformat." WHERE id_oeuvre=".$dest;
            $MaBase->exec($req);

        } else {
            http_response_code(404);
        }
    }
    


    // ARTISTES
    // ADD : Ajoute artiste depuis formulaire (post)
    function addArtiste($MaBase){
        $method=strtolower($_SERVER['REQUEST_METHOD']);
        if ($method == 'post') {

            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $facebook = $_POST['facebook'];
            $instagram = $_POST['instagram'];
            $twitter = $_POST['twitter'];
            $linkedin = $_POST['linkedin'];
            $bandcamp = $_POST['bandcamp'];

            $gnom = "'" . $nom . "'";
            $gprenom = "'" . $prenom . "'";
            $gfacebook = "'" . $facebook . "'";
            $ginstagram = "'" . $instagram . "'";
            $gtwitter = "'" . $twitter . "'";
            $glinkedin = "'" . $linkedin . "'";
            $gbandcamp = "'" . $bandcamp . "'";
            
            $gimg = "'" . UploadImage(getLastIdPersonne($MaBase) + 1,'a') . "'";
            $req = "INSERT INTO personnes(id_personne,nom,prenom,photo,facebook,instagram,twitter,linkedin,bandcamp) VALUES (NULL,".$gnom.",".$gprenom.",".$gimg.",".$gfacebook.",".$ginstagram.",".$gtwitter.",".$glinkedin.",".$gbandcamp.")";
            $MaBase->exec($req);

        } else {
            http_response_code(404);
        }
    }

    // UPDATE : Edite l'artiste depuis formulaire (post)
    function updateArtiste($MaBase){
        $method = strtolower($_SERVER['REQUEST_METHOD']);

        if ($method == 'post') {

            $uri = $_SERVER['REQUEST_URI'];
            $url = explode("/", $uri);
            $dest = $url[count($url) - 1];

            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $facebook = $_POST['facebook'];
            $instagram = $_POST['instagram'];
            $twitter = $_POST['twitter'];
            $linkedin = $_POST['linkedin'];
            $bandcamp = $_POST['bandcamp'];

            $gnom = "'" . $nom . "'";
            $gprenom = "'" . $prenom . "'";
            $gfacebook = "'" . $facebook . "'";
            $ginstagram = "'" . $instagram . "'";
            $gtwitter = "'" . $twitter . "'";
            $glinkedin = "'" . $linkedin . "'";
            $gbandcamp = "'" . $bandcamp . "'";

            // Remplacement photo
            foreach(getPersonnes($MaBase) as $o) {
                if ($o['id_personne'] == $dest) {
                    // on initialise le champ à la valeur actuelle
                    $img = $o['photo'];

                    // si on a effectivement uploadé une nouvelle image, on rechange le champ
                    if (UploadImage($dest, 'a') != 'a.png') {
                        $img = UploadImage($o['id_personne'], 'a');
                    }
                }
            }
            $gimg = "'".$img."'";

            $req = "UPDATE personnes SET nom=".$gnom.", prenom=".$gprenom.", photo=".$gimg .", facebook=".$gfacebook.", instagram=".$ginstagram.", twitter=".$gtwitter.", linkedin=".$glinkedin.", bandcamp=".$gbandcamp." WHERE id_personne=" . $dest;
            $MaBase->exec($req);

        } else {
            http_response_code(404);
        }
    }

    // DELETE : Supprime l'artiste (numéro /get)
    function deleteArtiste($MaBase){
    
        // Récupération id_oeuvre à supprimer dans l'URL
        $uri = $_SERVER['REQUEST_URI'];
        $url = explode("/", $uri);
        $dest = $url[count($url)-1];

        // Suppression de l'artiste
        $reqdel = 'DELETE FROM personnes WHERE id_personne='."'".$dest."'";
        $MaBase->exec($reqdel);

        // Suppression des roles liés à l'oeuvre
        $reqdelrole = 'DELETE FROM remplir_role WHERE id_personne='."'".$dest."'";
        $MaBase->exec($reqdelrole);

        $reqinc = 'ALTER TABLE personnes AUTO_INCREMENT=0';
        $MaBase->exec($reqinc);
    }




    // ADD & UPDATE : Uploade l'image nommée 'k' sur le serveur, et renvoie 'k.png'/'k.jpg'
    function UploadImage($k,$t) {
        
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
                //echo '' . $erreur . '<br><a href="javascript:history.back(1)">Retour</a>'; 
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
                $nom_image = $t.$k.$extention; 

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
            
        if ($extention!='') return $t.$k.$extention;
        else return $t.'.png';

    }
    