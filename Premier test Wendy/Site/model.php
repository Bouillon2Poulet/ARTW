<?php 

    $serveur = 'localhost';
    $bdd = 'artw';

    $user = "wendy";
    $pass = "1367";

    // Connexion à la BDD
    $MaBase = new PDO('mysql:host='.$serveur.';dbname='.$bdd, $user, $pass);


    // Selection de toutes les oeuvres + domaine + format
    $requete = 'SELECT id_oeuvre, titre, Domaines.nom_domaine, Formats.nom_format FROM Oeuvres JOIN Formats ON Oeuvres.id_format=Formats.id_format JOIN Domaines ON Domaines.id_domaine=Formats.id_domaine';
    
    $PDOoeuvres = $MaBase->query($requete);
    $oeuvres = [];

    while($ligne = $PDOoeuvres->fetch()){
        array_push($oeuvres, $ligne);
    }

    $PDOoeuvres->closeCursor();

    // Selection de tous les domaines
    $requetedom = 'SELECT id_domaine, nom_domaine FROM Domaines';

    $PDOdom = $MaBase->query($requetedom);
    $dom = [];

    while($ligne = $PDOdom->fetch()){
        array_push($dom, $ligne);
    }

    $PDOdom->closeCursor();

    // Selection de tous les formats
    $requetef = 'SELECT id_format, nom_format FROM Formats';

    $PDOf = $MaBase->query($requetef);
    $f = [];

    while($ligne = $PDOf->fetch()){
        array_push($f, $ligne);
    }

    $PDOf->closeCursor();

    


    // Permet de récupérer les oeuvres pour les lister dans la page listeOeuvres
    function getOeuvres(){
        global $oeuvres;
        return $oeuvres;
    }
    

    // Pour listes déroulantes domaines & formats
    function getdom(){
        global $dom;
        return $dom;
    }

    function getformat(){
        global $f;
        return $f;
    }


?>