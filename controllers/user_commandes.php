<?php
require 'models/users.php';
require 'models/book.php';
require 'models/articles.php';

if(empty($_SESSION['id'])){
    header("Location: ".ROOT_PATH);
    exit();
}


if(REQ_TYPE_ID){
    $commandes = getAllBooksByUserId($_SESSION['id']);
    if(empty($commandes)){
        header("Location: ".ROOT_PATH."user");
        $_SESSION['error'] = "Vous n'avez pas encore de commande";
        exit();
    }else{
    $commande_articles=array();
    $articles=array();
    foreach($commandes as $commande){
        $total=0;
        $commande_articlesTemp = getAllBooksArticlesByCommandeID($commande['id']);

}
foreach($commande_articlesTemp as $commande_article){
    array_push($articles, getArticleById($commande_article["articleID"]));
    array_push($commande_articles, $commande_article);
        $total += $commande_article["prix"];
}
}
} 
else {
    header("Location: ".ROOT_PATH."login");
    exit();
}


include 'views/user_commandes.php';
?>