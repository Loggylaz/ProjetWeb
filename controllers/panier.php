<?php
require 'models/articles.php';
require 'models/users.php';
require 'models/book.php';

if(empty($_SESSION['id'])){
    header("Location: ".ROOT_PATH);
    exit();
}

$articles=array();
$total= 0;
// $_SESSION['panier'] = [1,5,9];

// array_push($_SESSION['panier'], 1);
// array_push($_SESSION['panier'], 4);
// array_push($_SESSION['panier'], 6);

foreach($_SESSION['panier'] as $articlePanier){
    array_push($articles, getArticleById($articlePanier));
}

foreach($articles as $article){
    $total += $article["prix"];
}



// $articles=array();
// $commandeEnCours = array();

// $books = getAllBooksByUserId($_SESSION['id']);

// foreach($books as $book){
//     $bookArticles = getAllBooksArticlesByCommandeID($book['id']);
//     foreach($bookArticles as $bookArticle){
//        array_push($articles, getArticleById($bookArticle['articleID']));
//        array_push($commandeEnCours, $commandeEnCours);
//     }
// }

include 'views/panier.php';

?>