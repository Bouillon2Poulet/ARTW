<?php
    function setCurrentFolder(){
        $method = $_SERVER['REQUEST_METHOD'] ;
        $uri = $_SERVER['REQUEST_URI'];

        $url = explode("/", $uri);
        $current = $url[count($url)-1];

        if ($current=="index.php") {
            return '';
        } elseif ($url[count($url)-2] == 'oeuvre' || $url[count($url)-2] == 'deleteOeuvre'||$url[count($url)-2] == 'deleteArtiste'|| $url[count($url)-2] == 'artiste' || $url[count($url)-2] == 'editOeuvre' || $url[count($url)-2] == 'editOeuvreConfirm' ){
            return '../../';
        } else {
            return '../';
        }
    }
?>

<!-- Haut de page -->

<!DOCTYPE html>
<html lang="fr">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz:wght@200;300;400;500;600&display=swap" rel="stylesheet">

    <?php
        echo '<link rel=stylesheet href="'.setCurrentFolder().'styles.css">';
        echo '<link rel="icon" type="image/x-icon" href="'.setCurrentFolder().'images/favicon.svg">';
        
    ?>

    <title>partage.artw</title>
</head>

<body>
    
<h1>
    <!-- Logo -->
    <?php
        echo '<a href="'.setCurrentFolder().'index.php"><img src="'.setCurrentFolder().'images/logo.png" alt="Accueil" class="logo"></a>';
    ?>
    
    <!-- Titre -->
    PARTAGE.ARTW 

</h1>

    <!-- Barre navigation -->

    <?php
        echo '<nav><a href="'.setCurrentFolder().'index.php">Accueil </a> 
        - <a href="'.setCurrentFolder().'index.php/oeuvres">Oeuvres </a> -
        <a href="'.setCurrentFolder().'index.php/artistes">Artistes</a> -
        <a target="_blank" href="https://github.com/Bouillon2Poulet/ARTW"> Lien du Git </a> 
        </nav>'
    ?>

<br><br>



