<?php 

    // Connexion à la BDD
    
    // $serveur = 'sqletud.u-pem.fr';
    // $bdd = 'wendy.gervais_db';
    // $user = "wendy.gervais";
    // $pass = "1367";

    $serveur = "localhost";
    $bdd = "ARTW";
    // $user = "root";
    // $pass = "";

    // $user = "wendy";
    // $pass = "1367";

    $user = "rom1";
    $pass = "852456";


    
    $MaBase = new PDO('mysql:host='.$serveur.';dbname='.$bdd, $user, $pass);
    $MaBase->exec("SET NAMES UTF8");


    // Fonction qui exécute une requête req et renvoie le tableau rempli correspondant
    function requeteInTab($req,$MaBase){
        $PDO = $MaBase->query($req);
        $tab = [];

        while ($ligne = $PDO->fetch()){
            array_push($tab,$ligne);
        }

        $PDO->closeCursor();
        return $tab;
    }




//////////////////////////////////////
// Requetes //


    // récup les oeuvres
    function getOeuvres($MaBase){
        $requete = 'SELECT id_oeuvre, titre, description, image, url, domaines.nom_domaine, formats.nom_format FROM oeuvres JOIN formats ON oeuvres.id_format=formats.id_format JOIN domaines ON domaines.id_domaine=formats.id_domaine';
        return requeteInTab($requete, $MaBase);
    }
    
    // récup les domaines 
    function getDomaines($MaBase){
        $requetedom = 'SELECT * FROM domaines';
        return requeteInTab($requetedom,$MaBase);
    }

    // récup tous les formats
    function getFormats($MaBase){
        $requetef = 'SELECT id_format, nom_format FROM formats';
        return requeteInTab($requetef,$MaBase);
    }

    // récupère le dernier id_oeuvre
    function getLastIdOeuvre($MaBase){
        $requeteid = 'SELECT MAX(id_oeuvre) FROM oeuvres';
        return requeteInTab($requeteid,$MaBase)[0][0];
    }

    // Selection de toutes les personnes+leurs roles+oeuvres
    function getPersonnesAndRoles($MaBase) {
        $requeteFullPersonnes = 'SELECT * FROM personnes LEFT JOIN remplir_role ON personnes.id_personne = remplir_role.id_personne LEFT JOIN roles ON remplir_role.id_role = roles.id_role LEFT JOIN oeuvres ON remplir_role.id_oeuvre = oeuvres.id_oeuvre';
        return requeteInTab($requeteFullPersonnes, $MaBase);
    }

    // récup le nombre d'oeuvres dans lesquels la personne $n a participé
    function getNbOeuvresDePersonne($n, $MaBase) {
        $gn = "'".$n."'";
        $requetenbo = 'SELECT COUNT(DISTINCT id_oeuvre) FROM remplir_role WHERE id_personne='.$gn;
        return requeteInTab($requetenbo, $MaBase)[0][0];
    }
        
    // récup toutes les personnes
    function getPersonnes($MaBase){
        $requetePersonnes = 'SELECT * FROM personnes';
        return requeteInTab($requetePersonnes,$MaBase); 
    }

    // récup tous les roles
    function getRoles($MaBase){
        $requeteRoles = 'SELECT * FROM roles';
        return requeteInTab($requeteRoles,$MaBase);
    }

    // récup l'id de la dernière personne
    function getLastIdPersonne($MaBase){
        $requeteid2 = 'SELECT MAX(id_personne) FROM personnes';
        return requeteInTab($requeteid2,$MaBase)[0][0];
    }

    function getRolesdeOeuvreN($n, $MaBase) {
        $req = 'SELECT personnes.id_personne, prenom, nom, role FROM personnes JOIN remplir_role ON personnes.id_personne=remplir_role.id_personne JOIN roles ON roles.id_role = remplir_role.id_role WHERE remplir_role.id_oeuvre='.$n;
        return requeteInTab($req,$MaBase);
    }
    
?>