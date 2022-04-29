<?php
    require "views/header.php";
    include "controller.php";
    include "UploadImage.php";
?>


<!-- Formulaire d'ajout -->
<form action="/~wendy.gervais/artw/add.php" method="post" enctype="multipart/form-data">
<!-- <form action="/add.php" method="post"> -->


  <div>
    <label for="titre">Titre : </label>
    <input type="text" name="titre" id="titre" required>
  </div>

  <br>

  <div>
    <label for="titre">Description : </label>
    <textarea id="desc" name="desc">
</textarea>

  </div>

  <br>

  <div>
    <label for="nom_format">Format : </label>
    <select type="number" id="id_format" name="id_format" required> 
    <?php 
        listeFormats();
    ?> 
    </select>
  </div>

  <br>

  <div>
  <?php
    UploadImage(getlastid()+1); // Upload Image qui sera nommée idmax + 1 = id_oeuvre de l'oeuvre uploadée
 
  ?>
     <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $poids_max; ?>">
    <input type="file" id="image" name="image"> 
  </div>

<br>

<div>
    <label for="lien">Lien pour consulter le projet : </label>
    <input type="text" name="lien" id="lien">
</div>

  <br>

  <div>
    <input type="submit" value="Enregistrer" class="ajout">
  </div>

    </form>


    <?php 
      $method=strtolower($_SERVER['REQUEST_METHOD']);

    if ($method == 'post') {

      $titre = $_POST['titre'];
      $format = $_POST['id_format'];
      $desc = $_POST['desc'];
      $lien = $_POST['lien'];

      // $response = json_encode(array('titre'=> $titre, 'id_domaine'=>$domaine, 'id_format'=>$format));
      // header('HTTP/1.1 200 OK');

      // Add Oeuvre //
      $gtitre = "'".$titre."'";
      $gdesc = "'".$desc."'";
      $gformat = "'".$format."'";
      $glien = "'".$lien."'";
      $gimg = "'".UploadImage(getlastid()+1)."'";

      $req = "INSERT INTO Oeuvres(id_oeuvre, titre, description, image, url, id_format) VALUES (NULL," .$gtitre. "," .$gdesc. "," .$gimg. "," .$glien. ",".$gformat.")";
      $MaBase->exec($req);

      // $requete = 'INSERT INTO Oeuvres(id_oeuvre, titre, description, image, url, id_format) VALUES (NULL,?,?,?,?,?)';
      // $MaBase->prepare($requete);
      // $MaBase->execute(array($gtitre, $gdesc, '', '', $gformat));

    }

    else {
      http_response_code(404);
    }



    ?>

<br>
<a href="/~wendy.gervais/artw/index.php/oeuvres"> <- Retour à la liste des oeuvres</a>

      
