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

function setUser($id, $login, $email, $mdp, $rue = "", $numero = "", $cp = "", $localite = "", $pays = "") {
    $user = getUserById($id);
    //C'est ici qu'on va faire l'update de l'utilisateur.
    $reponse = getDB()->prepare('UPDATE UTILISATEUR SET login = :login, email = :email, mdp = :mdp, rue = :rue, numero = :numero, cp = :cp, localite = :localite, pays = :pays WHERE id = :id');
    if($mdp){
        $mdp = password_hash($mdp, PASSWORD_DEFAULT);
    }
    else {
        $mdp = $user['mdp'];
    }
    $reponse->execute([':id' => $id, ':email' => $email, ':mdp' => $mdp, ':login' => $login, ':rue' => $rue, ':numero' => $numero, ':cp' => $cp, ':localite' => $localite, ':pays' => $pays]);
    $reponse->closeCursor(); // Termine le traitement de la requête
}

function checkUserExists($login){
    $user = getUserByLogin($login);
    if(!$user){
        return true;
    }
}

function getAllFromUser(){
    $reponse = getDB()->query('SELECT * FROM UTILISATEUR');
    $users = $reponse->fetchAll();
    $reponse->closeCursor(); // Termine le traitement de la requête
    return $users;
}

function createUser($login, $mdp, $email, $nom, $prenom) {
    $reponse = getDB()->prepare('INSERT INTO UTILISATEUR SET login = :login, mdp = :mdp, email = :email, nom = :nom, prenom = :prenom, roleID = :roleID');
    $reponse->execute([':login' => $login, ':mdp' => password_hash($mdp, PASSWORD_DEFAULT), ':email' => $email, ':nom' => $nom, ':prenom' => $prenom, ':roleID' => 2]);
    $reponse->closeCursor(); // Termine le traitement de la requête
}

function deleteUser($login){
    $reponse = getDB()->prepare("DELETE FROM UTILISATEUR WHERE login = :login");
    $reponse->execute([':login' => $login]);
    $reponse->closeCursor();
}

?>
