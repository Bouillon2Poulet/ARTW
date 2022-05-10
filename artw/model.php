<?php 

    $serveur = 'sqletud.u-pem.fr';
    $bdd = 'wendy.gervais_db';

    $user = "wendy.gervais";
    $pass = "1367";

    // Connexion à la BDD
    $MaBase = new PDO('mysql:host='.$serveur.';dbname='.$bdd, $user, $pass);

    $MaBase->exec("SET NAMES UTF8");





    // Selection de toutes les oeuvres+domaine+format
    $requete = 'SELECT id_oeuvre, titre, description, image, url, Domaines.nom_domaine, Formats.nom_format FROM Oeuvres JOIN Formats ON Oeuvres.id_format=Formats.id_format JOIN Domaines ON Domaines.id_domaine=Formats.id_domaine';
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




    // Récupération de l'id de la dernière oeuvre
    $requeteid = 'SELECT MAX(id_oeuvre) FROM Oeuvres';
    $PDOid = $MaBase->query($requeteid);
    $id = [];
    while($ligne = $PDOid->fetch()){
        array_push($id, $ligne);
    }
    $PDOid->closeCursor();
    


    // Permet de récupérer les oeuvres pour les lister dans la page listeOeuvres
    function getOeuvres(){
        global $oeuvres;
        return $oeuvres;
    }
    

    // Pour accéder à ces données dans les views : 
    function getdom(){
        global $dom;
        return $dom;
    }

    function getformat(){
        global $f;
        return $f;
    }


    function getlastid(){
        global $id;
        return $id[0][0];
    }
    


?>