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

foreach($_SESSION['panier'] as $articlePanier){
    
    $articleID = getArticleById($articlePanier['id']);
    $totalByArticle =  $articleID['prix'] * $articlePanier['quantity'];
    $articleEnPanier = array("article" => $articleID, "quantity" => $articlePanier['quantity'], 'totalArticle' => $totalByArticle);
    array_push($articles, $articleEnPanier);

}

foreach($articles as $article){
    $total += $article["totalArticle"];
}

include 'views/panier_visu.php';

?>