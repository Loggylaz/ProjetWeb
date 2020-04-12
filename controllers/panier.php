<?php
require 'models/articles.php';
require 'models/users.php';
require 'models/book.php';

if(empty($_SESSION['id'])){
    header("Location: ".ROOT_PATH);
    exit();
}
$articles=array();

$books = getAllBooksByUserId($_SESSION['id']);

foreach($books as $book){
    $bookArticles = getAllBooksArticlesByCommandeID($book['id']);
    foreach($bookArticles as $bookArticle){
       array_push($articles, getArticleById($bookArticle['id']));
    }
}



include 'views/panier.php';

?>