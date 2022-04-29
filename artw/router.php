<?php

// ROUTEUR : Redirige vers la bonne page selon ce qui est entré dans l'URL (via GET)


$method = $_SERVER['REQUEST_METHOD'] ;
$uri = $_SERVER['REQUEST_URI'];


global $url;
global $dest;


// Explode url
$url = explode("/", $uri);
$dest = $url[count($url)-1];


include "views/header.php";         

// Accueil du site
if ($dest=="app.php") {
    include "views/accueil.php";
}

// Liste des films
if ($dest=="oeuvres") {
    include "views/listeOeuvres.php";
}

// Visualisation d'un film
if (count($url)>4) {
    include "views/oeuvre.php";
}

include "views/footer.php";


?>






