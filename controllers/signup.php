<?php
require 'models/users.php';

if(!empty($_SESSION['id'])){
    header("Location: ".ROOT_PATH);
    exit();
}
if(!empty($_POST)) {
    if(!empty($_POST['login']) && !empty($_POST['mdp']) && !empty($_POST['confirmmdp']) && !empty($_POST['email']) && !empty($_POST['nom']) && !empty($_POST['prenom']))
    {
        if($_POST['mdp'] != $_POST['confirmmdp']){
            $_SESSION['error'] = "Votre mot de passe et votre mot de passe de confirmation ne correspondent pas...";
        }
        else if(checkUserExists($_POST['login']) == true)
        {
            $user = createUser($_POST['login'], $_POST['mdp'], $_POST['email'], $_POST['nom'], $_POST['prenom']);
            $user = getUserByLogin($_POST['login']);
            $_SESSION['id'] = $user['id'];
            $_SESSION['message'] = "Bienvenue ".$_POST['login'];
            header('Location: '.ROOT_PATH);
            exit();
        }
        else
        {
            $_SESSION['error'] = "Le login ".$_POST['login']." existe déjà...";
            
        }
        
    }
    else
    {
        //Ici on va prévenir l'utilisateur qu'il manque quelque chose
        $_SESSION['error'] = "Tu as oublié d'encoder quelque chose...";
    }
}
include 'views/signup.php';
?>


