#  ![logo artw git petit](https://user-images.githubusercontent.com/103901906/163815289-400c2ad6-9ccb-4579-b116-8f99b5db498c.png)   Projet Backend

LIEN HEBERGÉ : https://perso-etudiant.u-pem.fr/~wendy.gervais/artw/index.php

![image](https://user-images.githubusercontent.com/103901906/232209476-4db3a2eb-a221-4d07-a9dc-9b287a2f11ad.png)
![image](https://user-images.githubusercontent.com/103901906/232209618-a8af5c4c-434f-4dbf-a17d-4a738f203046.png)
![image](https://user-images.githubusercontent.com/103901906/232209607-40a3c918-dde6-4eb4-8d3d-57eb3256a0ca.png)



## Lancement en local

importer la base de données (Sauvegarde BDD > artw.sql) dans phpmyadmin en tant que "ARTW"

éventuellement modifier bdd, user, pass dans model.php (ligne 13) :
```    
    $uploads = "/ARTW/artw/uploads/";
    $serveur = "localhost";  
    $bdd = "ARTW";  
    $user = "root";  
    $pass = "";
    
  ```
  
  Normalement, tous les liens sont en relatif, il suffit de placer le **repo** ARTW (!) à la racine du dossier serveur et d'accéder à localhost/ARTW/artw/index.php
  (ou localhost:port/ARTW/artw/index.php) 
  
  il est aussi possible de placer uniquement le **dossier du site** ("artw") à la racine du serveur, il faut alors changer $uploads en "/artw/uploads/" et accéder à localhost/artw/index.php (ou localhost:port/artw/index.php) 
  (il reste préférable de placer directement le repo "grand dossier", ARTW)


## Endpoints (16)

``` 
artw/index.php

artw/index.php/oeuvres
artw/index.php/oeuvre/n
artw/index.php/choixDomaine 
artw/index.php/addOeuvre?domaine=n (GET)
artw/index.php/addOeuvreConfirm (POST)
artw/index.php/deleteOeuvre/n
artw/index.php/editOeuvre/n
artw/index.php/editOeuvreConfirm/n (POST)

artw/index.php/artistes
artw/index.php/artiste/n
artw/index.php/addArtiste
artw/index.php/addArtisteConfirm (POST)
artw/index.php/deleteArtiste/n 
artw/index.php/editArtiste/n
artw/index.php/editArtist/n (POST)

```


## Pitch 


pARTage.artw se veut être une plateforme collaborative de partage de projets artistiques étudiants. 

L’équipe ARTW (pour Axel, Romain, Tristan et Wendy) tient son nom non seulement de nos initiales, mais aussi des mots “Artwork”, “Art & Web”, “Art World” et “Art Wiki”.


## BdD (5 entités, 5 relations)

![Merise2](https://user-images.githubusercontent.com/103901906/165320954-ca3e9a0e-295e-414b-a777-05059b527ece.png)

[Dossier Pitch Merise.pdf](https://github.com/Bouillon2Poulet/ARTW/files/8593040/Dossier.Pitch.Merise.pdf)
