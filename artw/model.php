<?php 

    // Répertoire images, Connexion à la BDD

    // Mode hébergé
    // $uploads = "https://perso-etudiant.u-pem.fr/~wendy.gervais/artw/uploads/";
    // $serveur = 'sqletud.u-pem.fr';
    // $bdd = 'wendy.gervais_db';
    // $user = "wendy.gervais";
    // $pass = "1367";

    // Mode local
    $uploads = "/ARTW/artw/uploads/";
    $serveur = "localhost";
    $bdd = "ARTW";
    $user = "root";
    $pass = "";
    // $user = "rom1";
    // $pass = "852456";

    global $uploads;
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
        $requete = 'SELECT id_oeuvre, titre, description, image, url, domaines.nom_domaine, formats.nom_format, formats.id_format FROM oeuvres JOIN formats ON oeuvres.id_format=formats.id_format JOIN domaines ON domaines.id_domaine=formats.id_domaine ORDER BY nom_domaine ASC';
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
        $requetePersonnes = 'SELECT * FROM personnes ORDER BY prenom';
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

    function getPersonnesdeOeuvreN($n, $MaBase) {
        $req = 'SELECT DISTINCT personnes.id_personne, prenom, nom, photo FROM personnes JOIN remplir_role ON personnes.id_personne=remplir_role.id_personne WHERE remplir_role.id_oeuvre='.$n;
        return requeteInTab($req,$MaBase);
    }


    function getDomaineFromFormat($MaBase, $format){
        $requetef = 'SELECT id_domaine FROM formats WHERE id_format='.$format;
        return requeteInTab($requetef, $MaBase)[0][0];
    }

    
    function getRolesdePersonneDdansOeuvreN($p, $n, $MaBase) {
        $req = 'SELECT role FROM personnes JOIN remplir_role ON personnes.id_personne=remplir_role.id_personne JOIN roles ON roles.id_role = remplir_role.id_role WHERE remplir_role.id_oeuvre='.$n.' AND remplir_role.id_personne='.$p ;
        return requeteInTab($req,$MaBase);
    }
    
?>