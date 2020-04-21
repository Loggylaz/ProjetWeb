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
        $articlesTemp = getArticleByID($book['id']);
        array_push($articles, array('id' => $articlesTemp['id'], 'nom' => $articlesTemp['nom'], 'prix' => $articlesTemp['prix'], 'stock' => $articlesTemp['stock'], 'poid' => $articlesTemp['poid'], 'marque' => $articlesTemp['marque'], 'categorieID' => $articlesTemp['categorieID'],  'image' => $articlesTemp['image'], 'description' => $articlesTemp['description'],  'quantite' => $book['quantity'] ));
    }

    foreach($articles as $article){
        $total += $article['prix'];
    }

    createCommande($_SESSION['id'], $total);
    $commandeID = getLastIdInserted($_SESSION['id']);

    $quantite = 1;
    foreach($articles as $article){
        foreach($_SESSION['panier'] as $panier)
        if($article['id'] == $panier['id']){
            $quantite = $_SESSION["panier"]['quantite'];
        }
        createCommandeArticle($commandeID, $article['id'], $article['prix'], $quantite);
    }

    unset($_SESSION['panier']);
    $_SESSION['panier'] =[];
    $_SESSION['articleQty'] = 0;
}
else
{
    header('Location: '.ROOT_PATH);
    $_SESSION['message'] = "Votre panier est vide !";
    exit();
}

include 'views/commande.php';

?>