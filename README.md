# ProjetWeb
Le projet fonctionne avec la version 5.6 de php.
Editer les variables, $BDD_URL, $BDD_LOGIN, $BDD_PASS dans le fichier index.php.
$BDD_URL: chemin vers votre db MySQL
$BDD_LOGIN: utilisateur ayant accès en lecture/écriture à la db.
$BDD_PASS: mot de passe de l'utilisateur utilisé pour la connexion à la db ($BDD_LOGIN).
Créer une base de données MySQL ayant pour nom "superchouette" et procéder au restore du dump du fichier superchouette.sql accessible à la racine du répertoire.
 
/!\ Attention, pour les stats : Il se peut que vous deviez modifier, soit les liens qui font appel aux données directement dans le js ou bien votre hostname dans votre config xampp. Pour modifier les liens, allez dans public/js/stats.js et modifiez les deux liens $.getJSON. Remplacez monprojet.test par votre hostname.
