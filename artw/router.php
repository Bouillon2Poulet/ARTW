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


    if (count($urlget)>=2) {
        $destget = $urlget[count($urlget)-2];
    }
    else {
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
    if ($url[count($url)-2] == 'oeuvre') {
        include "views/oeuvre.php";
    }

    // Suppression d'une oeuvre
    if ($url[count($url)-2] == 'deleteOeuvre') {
        include "views/deleteOeuvre.php";
    }

    // Modification d'une oeuvre
    if ($url[count($url)-2] == 'editOeuvre') {
        include "views/editOeuvre.php";
    }

    // Confirmation de la modification d'une oeuvre
    if ($url[count($url)-2]=="editOeuvreConfirm") {
        include "views/editOeuvreConfirm.php";
    }


    // ARTISTES
    // Liste des artistes
    if ($dest=="artistes") {
        include "views/listeArtistes.php";
    }
    // Ajouter une oeuvre
    if ($dest=="addArtiste"){
        include "views/addArtiste.php";
    }

    // Confirmer l'ajout d'une oeuvre
    if ($dest=="addArtisteConfirm") {
        include "views/addArtisteConfirm.php";
    }

    // Suppression d'un.e artiste
    if ( $url[count($url)-2] == 'deleteArtiste') {
        include "views/deleteArtiste.php";
    }

    // Visualisation d'un.e artiste
    else if ($url[count($url)-2] == 'artiste') {
        include "views/artiste.php";
    }

    // Modification d'un.e artiste
    if ($url[count($url)-2] == 'editArtiste') {
        include "views/editArtiste.php";
    }

    // Confirmation de la modification d'un.e artiste
    if ($url[count($url)-2]=="editArtisteConfirm") {
        include "views/editArtisteConfirm.php";
    }

        

    
    include "views/footer.php";


?>






