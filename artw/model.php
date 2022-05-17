<?php 

    
    // partie de connexion sur serveur de wendy 
    
    $serveur = 'sqletud.u-pem.fr';
    $bdd = 'wendy.gervais_db';

    $user = "wendy.gervais";
    $pass = "1367";

    //////////////////////

    $serveur = "localhost";
    $bdd = "wendy.gervais_db";

     $user = "root";
    $pass = "";

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


    function requeteInTab($req,$MaBase){
        $PDO = $MaBase->query($req);
        $tab = [];
        while ($ligne = $PDO->fetch()){
            array_push($tab,$ligne);
        }
        $PDO->closeCursor();
        return $tab;
    }


    // Selection de tous les domaines
    $requetedom = 'SELECT id_domaine, nom_domaine FROM domaines';
    $dom = requeteInTab($requetedom,$MaBase);

    
    // Selection de tous les id
    $requeteid = 'SELECT MAX(id_oeuvre) FROM oeuvres';
    $id = requeteInTab($requeteid,$MaBase);

 

    // Permet de récupérer les oeuvres pour les lister dans la page listeOeuvres
    function getOeuvres(){
        global $oeuvres;
        return $oeuvres;
    }
    

    // récup les domaines 
    function getdom($MaBase){
        $requetedom = 'SELECT id_domaine, nom_domaine FROM domaines';
        $dom = requeteInTab($requetedom,$MaBase);

        global $dom;
        return $dom;
    }

    // récupère tous les format
    function getformat($MaBase){
        $requetef = 'SELECT id_format, nom_format FROM formats';
        $f = requeteInTab($requetef,$MaBase);
        global $f;
        return $f;
    }

    // récupère toutes les id
    function getlastid($MaBase){
        $requeteid = 'SELECT MAX(id_oeuvre) FROM oeuvres';
        $id = requeteInTab($requeteid,$MaBase);
        global $id;
        return $id[0][0];
    }




    // récup le nombre d'oeuvre
    function getNbOeuvre($n, $MaBase) {

        $gn = "'".$n."'";

        $requetenbo = 'SELECT COUNT(DISTINCT id_oeuvre) FROM remplir_role WHERE id_personne='.$gn;

        $PDO = $MaBase->query($requetenbo);
        $nb = [];
        while($ligne = $PDO->fetch()){
            array_push($nb, $ligne);
        }
        $PDO->closeCursor();

        echo $nb[0][0];

        global $nb;
        return $nb[0][0];

    }
        

    // récup toutes les personnes
    function getpersonnes($MaBase){
        $requetePersonnes = 'SELECT * FROM personnes';
        $personnes = requeteInTab($requetePersonnes,$MaBase);    
        global $personnes;
        return $personnes;
    }

    // récup tous les rôles
    function getroles($MaBase){
        $requeteRoles = 'SELECT * FROM rôles';
        $roles = requeteInTab($requeteRoles,$MaBase);
        global $roles;
        return $roles;
    }

    // récup l'id de la dernière personne
    function getlastid2($MaBase){
        $requeteid2 = 'SELECT MAX(id_personne) FROM personnes';
        $id2 = requeteInTab($requeteid2,$MaBase);
        global $id2;
        return $id2[0][0];
    }
    
?>