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

function setUser($id, $login, $email, $password, $rue = "", $numero = "", $cp = "", $localite = "", $pays = "", $nom = "", $prenom = "") {
    $user = getUserById($id);
    //C'est ici qu'on va faire l'update de l'utilisateur.
    $reponse = getDB()->prepare('UPDATE UTILISATEUR SET login = :login, mdp = :mdp, email = :email, rue = :rue, numero = :numero, cp = :cp, localite = :localite, pays = :pays, nom = :nom, prenom = :prenom WHERE id = :id');
    if($password){
        $password = password_hash($password, PASSWORD_DEFAULT);
    }
    else {
        $password = $user['mdp'];
    }
    $reponse->execute([':id' => $id, ':login' => $login, ':mdp' => $password, ':email' => $email, ':rue' => $rue, ':numero' => $numero, ':cp' => $cp, ':localite' => $localite, ':pays' => $pays, ':nom' => $nom, ':prenom' => $prenom ]);
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
    $reponse->execute([':login' => $login, ':mdp' => password_hash($mdp, PASSWORD_DEFAULT), ':email' => $email, ':nom' => $nom, ':prenom' => $prenom, ':roleID' => 3]);
    $reponse->closeCursor(); // Termine le traitement de la requête
}

function getAllFromUser(){
    $reponse = getDB()->query('SELECT * FROM UTILISATEUR WHERE actif = 1');
    $users = $reponse->fetchAll();
    $reponse->closeCursor(); // Termine le traitement de la requête
    return $users;
}


function deleteUser($login){
    $reponse = getDB()->prepare("UPDATE UTILISATEUR SET actif = 0 WHERE login = :login");
    $reponse->execute([':login' => $login]);
    $reponse->closeCursor();
}

function checkUserRole($id){
    $reponse = getUserById($id);
    return $reponse['roleID'];
}
?>
