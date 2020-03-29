<?php
require 'models/articles.php';
require 'models/users.php';
if(empty($_SESSION['id']) || checkUserRole($_SESSION['id']) >= 3){
    header("Location: ".ROOT_PATH);
    exit();
}
$categories = getAllFromCategories();
if(!empty($_POST)) {
    if(!empty($_POST['nom']) || !empty($_POST['prix']) || !empty($_POST['categorieID'])){

        if(checkArticleExists($_POST['nom']) == true)
        {
            $article = createArticle($_POST['nom'], $_POST['prix'], $_POST['stock'], $_POST['poid'], $_POST['marque'], $_POST['categorieID'], $_POST['image'], $_POST['description']);
            $_SESSION['message'] = "L'article ".$_POST['nom']." ajouté avec succés";
            header('Location: '.ROOT_PATH.'admin_article');
            exit();
        }
        else
        {
            $_SESSION['error'] = "L'article ".$_POST['nom']." existe déjà...";           
        }
        
    }
    else
    {
        //Ici on va prévenir l'utilisateur qu'il manque quelque chose
        $_SESSION['error'] = "Les champs Nom, Prix et Catégorie sont obligatoire !";
    }
}
include 'views/article_add.php';
?>

