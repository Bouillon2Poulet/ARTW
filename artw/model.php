<?php 

    
    // partie de connexion sur serveur de wendy 
    
    // $serveur = 'sqletud.u-pem.fr';
    // $bdd = 'wendy.gervais_db';


    $serveur = "localhost";
    $bdd = "ARTW";

    $user = "wendy";
    $pass = "1367";


    // $user = "rom1";
    // $pass = "852456";

    

    // Connexion à la BDD
    $MaBase = new PDO('mysql:host='.$serveur.';dbname='.$bdd, $user, $pass);
    $MaBase->exec("SET NAMES UTF8");


    // Selection de toutes les oeuvres+domaine+format
    $requete = 'SELECT id_oeuvre, titre, description, image, url, domaines.nom_domaine, formats.nom_format FROM oeuvres JOIN formats ON oeuvres.id_format=formats.id_format JOIN domaines ON domaines.id_domaine=formats.id_domaine';
    $PDOoeuvres = $MaBase->query($requete);
    $oeuvres = [];
    while($ligne = $PDOoeuvres->fetch()){
        array_push($oeuvres, $ligne);
    }
    $PDOoeuvres->closeCursor();



    // Selection de tous les domaines
    $requetedom = 'SELECT id_domaine, nom_domaine FROM domaines';
    $PDOdom = $MaBase->query($requetedom);
    $dom = [];
    while($ligne = $PDOdom->fetch()){
        array_push($dom, $ligne);
    }
    $PDOdom->closeCursor();




    // Selection de tous les formats
    $requetef = 'SELECT id_format, nom_format FROM formats';
    $PDOf = $MaBase->query($requetef);
    $f = [];
    while($ligne = $PDOf->fetch()){
        array_push($f, $ligne);
    }
    $PDOf->closeCursor();




    // Récupération de l'id de la dernière oeuvre
    $requeteid = 'SELECT MAX(id_oeuvre) FROM oeuvres';
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


    

    // Selection de toutes les personnes+leurs rôles+oeuvres
    $requeteFullPersonnes = 'SELECT * FROM personnes LEFT JOIN remplir_role ON personnes.id_personne = remplir_role.id_personne LEFT JOIN rôles ON remplir_role.id_rôle = rôles.id_rôle LEFT JOIN oeuvres ON remplir_role.id_oeuvre = oeuvres.id_oeuvre';
    
    $PDOpersonnesF = $MaBase->query($requeteFullPersonnes);
    $personnesF = [];
    while($ligne = $PDOpersonnesF->fetch()){
        array_push($personnesF, $ligne);
    }
    $PDOpersonnesF->closeCursor();


    // Selection de toutes les personnes
    $requetePersonnes = 'SELECT * FROM personnes';
    $PDOpersonnes = $MaBase->query($requetePersonnes);
    $personnes = [];
    while($ligne = $PDOpersonnes->fetch()){
        array_push($personnes, $ligne);
    }
    $PDOpersonnes->closeCursor();


    // Selection de tous les rôles
    $requeteRoles = 'SELECT * FROM rôles';
    $PDOroles = $MaBase->query($requeteRoles);
    $roles = [];
    while($ligne = $PDOroles->fetch()){
        array_push($roles, $ligne);
    }
    $PDOroles->closeCursor();


    // Récupération de l'id de la dernière personne
    $requeteid = 'SELECT MAX(id_personne) FROM personnes';
    $PDOid2 = $MaBase->query($requeteid);
    $id2 = [];
    while($ligne = $PDOid2->fetch()){
        array_push($id2, $ligne);
    }
    $PDOid->closeCursor();



    function getNbOeuvre($n, $MaBase) {

        $gn = "'".$n."'";

        $requetenbo = 'SELECT COUNT(DISTINCT id_oeuvre) FROM remplir_role WHERE id_personne='.$gn;

        $PDO = $MaBase->query($requetenbo);
        $nb = [];
        while($ligne = $PDO->fetch()){
            array_push($nb, $ligne);
        }
        $PDO->closeCursor();

      
        return $nb[0][0];

    }
        


    function getPersonnes(){
        global $personnes;
        return $personnes;
    }

    function getPersonnesandRoles(){
        global $personnesF;
        return $personnesF;
    }

    function getroles(){
        global $roles;
        return $roles;
    }


    function getlastid2(){
        global $id2;
        return $id2[0][0];
    }
    
?>