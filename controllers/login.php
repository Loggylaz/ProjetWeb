<?php
require 'models/users.php';

function isValidUser($login, $mdp) {
    $user = getUserByLogin($login);
    //Ici on va vérifier si le login/pass est bon
    if($user && password_verify($mdp, $user['mdp'] ))
    {
        return $user;
    }
}

if(!empty($_SESSION['id'])){
    header("Location: ".ROOT_PATH);
    exit();
}
if(!empty($_POST)) {
    if(!empty($_POST['login']) && !empty($_POST['mdp']))
    {
        if(checkUserExists($_POST['login']) != true)
        {
            $user = isValidUser($_POST['login'], $_POST['mdp']);
            if($user)
            {
                //Authentification OK
                $_SESSION['id'] = $user['id'];
                $_SESSION['message'] = "Bienvenue ".$user['login'];
                header("Location: ".ROOT_PATH);
                exit();
            }
            else
            {
                //Authentification NOK
                $_SESSION['error'] = "Mauvais login/password";
            }
        }
        else
        {
            $_SESSION['error'] = "Le login ".$_POST['login']." n'existe pas";
        }
    }
    else
    {
        //Ici on va prévenir l'utilisateur qu'il manque quelque chose
        $_SESSION['error'] = "Tu as oublié d'encoder quelque chose...";
    }
}
include 'views/login.php';
?>
