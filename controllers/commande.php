<?php
require "models/articles.php";
require "models/book.php";

if(empty($_SESSION['id'])){
    header('Location: '.ROOT_PATH);
    exit();
}

$articles=array();
$total = 0;

if(!empty($_SESSION["panier"])){


    foreach($_SESSION['panier'] as $book){
        array_push($articles, getArticleById($book));
    }

    foreach($articles as $article){
        $total += $article['prix'];
    }

    createCommande($_SESSION['id'], $total);
    $commandeID = getLastIdInserted($_SESSION['id']);

    foreach($articles as $article){
        createCommandeArticle($commandeID, $article['id'], $article['prix']);
    }

    unset($_SESSION['panier']);
    $_SESSION['panier'] =[];
}
else
{
    header('Location: '.ROOT_PATH);
    $_SESSION['message'] = "Votre panier est vide !";
    exit();
}

include 'views/commande.php';

?>