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
if ($dest=="index.php") {
    include "views/accueil.php";
}

// Liste des films
if ($dest=="oeuvres") {
    include "views/listeOeuvres.php";
}

// Ajouteur une oeuvre
if ($dest=="addOeuvre") {
    include "views/addOeuvre.php";
}

// Confirmer l'ajout d'une oeuvre
if ($dest=="addOeuvreConfirm") {
    include "views/addOeuvreConfirm.php";
}

// Visualisation d'une oeuvre
if ( $url[count($url)-2] == 'oeuvre') {
    include "views/oeuvre.php";
}

// Suppression d'une oeuvre
if ( $url[count($url)-2] == 'delete') {
    include "views/deleteOeuvre.php";
}

include "views/footer.php";


?>






