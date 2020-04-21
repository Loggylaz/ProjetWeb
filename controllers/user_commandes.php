<?php
require 'models/users.php';
require 'models/book.php';
require 'models/articles.php';

if(empty($_SESSION['id'])){
    header("Location: ".ROOT_PATH);
    exit();
}

$date = getdate();

if(REQ_TYPE_ID){
    $commandes = getAllBooksByUserId($_SESSION['id']);
    if(empty($commandes)){
        header("Location: ".ROOT_PATH."user");
        $_SESSION['error'] = "Vous n'avez pas encore de commande";
        exit();
    }else{
    $articles=array();

    foreach($commandes as $commande){
        $commande_articlesTemp = getAllBooksArticlesByCommandeID($commande['id']);
        foreach($commande_articlesTemp as $commande_article){
            array_push($articles, getEverythingBookedByUserId($_SESSION['id'], $commande_article['id'], $commande_article['articleID']));
        }
}
}
} 
else {
    header("Location: ".ROOT_PATH."login");
    exit();
}


include 'views/user_commandes.php';
?>