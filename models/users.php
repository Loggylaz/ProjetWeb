<?php
require_once 'models/db.php';

function getUserById($id) {
    $reponse = getDB()->prepare('SELECT * FROM UTILISATEUR WHERE id = :id');
    $reponse->execute([':id' => $id]);
    $user = $reponse->fetch();
    $reponse->closeCursor(); // Termine le traitement de la requête
    return $user;
}

function getUserByLogin($login) {
    $reponse = getDB()->prepare('SELECT * FROM UTILISATEUR WHERE login = :login');
    $reponse->execute([':login' => $login]);
    $user = $reponse->fetch();
    $reponse->closeCursor(); // Termine le traitement de la requête
    return $user;
}

function setUser($id, $login, $email, $mdp) {
    $user = getUserById($id);
    //C'est ici qu'on va faire l'update de l'utilisateur.
    $reponse = getDB()->prepare('UPDATE UTILISATEUR SET login = :login, email = :email, mdp = :mdp WHERE id = :id');
    if($mdp){
        $mdp = password_hash($mdp, PASSWORD_DEFAULT);
    }
    else {
        $mdp = $user['mdp'];
    }
    $reponse->execute([':id' => $id, ':email' => $email, ':mdp' => $mdp, ':login' => $login]);
    $reponse->closeCursor(); // Termine le traitement de la requête
}

function checkUserExists($login){
    $user = getUserByLogin($login);
    if(!$user){
        return true;
    }
}

function createUser($login, $mdp, $email, $nom, $prenom) {
    $reponse = getDB()->prepare('INSERT INTO UTILISATEUR SET login = :login, mdp = :mdp, email = :email, nom = :nom, prenom = :prenom, roleID = :roleID');
<<<<<<< Updated upstream
    $reponse->execute([':login' => $_POST['login'], ':mdp' => password_hash($_POST['mdp'], PASSWORD_DEFAULT), ':email' => $_POST['email'], ':nom' => $_POST['nom'], ':prenom' => $_POST['prenom'], ':roleID' => 1]);
=======
    $reponse->execute([':login' => $login, ':mdp' => password_hash($mdp, PASSWORD_DEFAULT), ':email' => $email, ':nom' => $nom, ':prenom' => $prenom, ':roleID' => 2]);
>>>>>>> Stashed changes
    $reponse->closeCursor(); // Termine le traitement de la requête
}

?>
