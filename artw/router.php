<?php

// ROUTEUR : Redirige vers la bonne page selon ce qui est entré dans l'URL (via GET)


$method = $_SERVER['REQUEST_METHOD'] ;
$uri = $_SERVER['REQUEST_URI'];


global $url;
global $dest;


// Explode url
$url = explode("/", $uri);
$dest = $url[count($url)-1];


// en cas de GET pour oeuvre
$urlget = explode("?", $uri);



if (count($urlget)>=2){
    $destget = $urlget[count($urlget)-2];
}else{
    $destget = $urlget[count($urlget)-1];
}

$urlget2 = explode("/", $destget);
$destget2 = $urlget2[count($urlget2)-1];




include "views/header.php";

// Accueil du site
if ($dest=="index.php") {
    include "views/accueil.php";
}


// OEUVRES
// Liste des oeuvres
if ($dest=="oeuvres") {
    include "views/listeOeuvres.php";
}

// Ajouter une oeuvre
if ($dest=="choixDomaine") {
    include "views/choixDomaine.php";
}

// Ajouter une oeuvre
if ($destget2=="addOeuvre") {
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


// ARTISTES
// Liste des artistes
if ($dest=="artistes") {
    include "views/listeArtistes.php";
}

// Visualisation d'un artiste
else if ( $url[count($url)-2] == 'artiste') {
    include "views/artiste.php";
}


include "views/footer.php";


?>






