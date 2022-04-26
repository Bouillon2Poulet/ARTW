<?php
    require "views/header.php";
    include "controller.php";
?>


<!-- Formulaire d'ajout -->
<form action="/add.php" method="post">

  <div>
    <label for="titre">Titre : </label>
    <input type="text" name="titre" id="titre" required>
  </div>

  <br>

  <div>
    <label for="nom_domaine">Domaine : </label>
    <select type = "number" id="id_domaine" name="id_domaine"> 
    <?php 
        listeDomaines();
    ?> 
    </select>
  </div>


  <div>
    <label for="nom_format">Format : </label>
    <select type = "number" id="id_format" name="id_format"> 
    <?php 
        listeFormats();
    ?> 
    </select>
  </div>


<br>

  <div>
    <input type="submit" value="Enregistrer" class="ajout">
  </div>

    </form>


    <?php 
        $method=strtolower($_SERVER['REQUEST_METHOD']);

        // Encodage de la réponse en Json
        if ($method == 'post') {

          $titre = $_POST['titre'];
          $format = $_POST['id_format'];

          $response = json_encode(array('titre'=> $titre, 'id_domaine'=>$domaine, 'id_format'=>$format));
          header('HTTP/1.1 200 OK');

          // Add Oeuvre //
          $gtitre = "'".$titre."'";
          $gformat = "'".$format."'";
          $req = "INSERT INTO Oeuvres(id_oeuvre, titre, description, image, url, id_format) VALUES (NULL," .$gtitre. ", '', '', '',".$gformat.")";

          $MaBase->exec($req);

    
        }

        else {
          http_response_code(404);
        }



    ?>

<br>
<a href="/app.php/oeuvres"> <- Retour à la liste des oeuvres</a>

      
