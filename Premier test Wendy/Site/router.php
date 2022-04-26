<?php

// ROUTEUR : Redirige vers la bonne page selon ce qui est entré dans l'URL (via GET + explode de l'uri)


$method = $_SERVER['REQUEST_METHOD'] ;
$uri = $_SERVER['REQUEST_URI'];


global $url;
global $dest;


// Explode url
$url = explode("/", $uri);
$dest = $url[count($url)-1];

// Accueil du site
if ($dest=="app.php") {
    include "views/accueil.php";
}

// Liste des films
if ($dest=="oeuvres") {
    include "views/listeOeuvres.php";
}

// Page ajout
if ($dest=="ajout") {
    include "views/ajout.php";
}

// Visualisation d'une oeuvre
else if (count($url)>3) {
    include "views/oeuvre.php";
}

include "views/footer.php";


?>






