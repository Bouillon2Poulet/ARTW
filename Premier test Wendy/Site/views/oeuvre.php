<?php 
    include "controller.php";
    require "views/header.php";         
?>

    <div> Détails de l'oeuvre </div>
    <br>

<?php 


    foreach(getOeuvres() as $o) {
        if ($o['id_oeuvre'] == $dest) {
           echo $o['titre'];
           echo " appartient au domaine ";
           echo $o['nom_domaine'];
           echo " en tant que ";
           echo $o['nom_format'];
        }
   }
?>

<br>
<br>

<a href="/app.php/oeuvres"> <- Retour à la liste des oeuvres</a>

