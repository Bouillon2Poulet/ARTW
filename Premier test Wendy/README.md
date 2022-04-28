
# premier test Wendo

## structure

app.php = coeur de tout (on accède par http://.../app.php)

**Modèle** : 
- model.php 
- BDD SQL artw

**Vue** : dossier views 
- header+footer rappelés à chaque vue. Header contient titre site + navbar
- accueil : bienvenue + lien vers liste oeuvres
- listeOeuvres : liste des oeuvres + bouton ajouter (fonctionnel) + boutons modifier (pas encore fait) et supprimer (fonctionnel)
- oeuvre : page de visualisation d'une oeuvre. Accès en oeuvre/1, oeuvre/2 ... avec Get
- le styles.css pour le... style... ( ͡° ͜ʖ ͡°)

**Contrôleur** : controller.php pour rediriger l'utilisateur à la bonne page en explodant uri


page **add** : formulaire pour ajouter une oeuvre  
page **delete** : permet d'effacer l'oeuvre correspondant à la bonne ligne du tableau grâce à un get d'url + re'dirige vers page delete avec redirection auto sur listeoeuvres, supprime oeuvre de la BDD + reset l'auto-increment des id_oeuvres (comme ça quand on en re-rajoutera une, y aura plus de pb d'incrémentation des id)



## pour lancer dans serveur php
clone repo


lancement serveur local **dans le dossier Site** :
` php -S localhost:8080`

phpmyadmin
`http://127.0.0.1/phpmyadmin/index.php`

télécharger Bdd/artw.sql et importer dans phpmyadmin 

remplacer user & pass dans model.php : 

![image](https://user-images.githubusercontent.com/103901906/165371989-03a54417-3e44-4663-9393-e902ba638e02.png)

accès `http://localhost:8080/app.php`
